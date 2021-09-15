<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Oex_students;

use App\Oex_exam_question_master;

use App\Oex_student_exam_map;

use App\model\Oex_result;

class StudentOperation extends Controller
{
    //

    public function dashboard()
    {
    	if(!Session::get('student_session'))
    	{
    		return redirect(url('student/signup'));
    	}
    	//echo $session_data = Session::get('student_session');
    	$data['student_info'] = Oex_students::select(['oex_students.*','oex_exam_masters.title','oex_exam_masters.exam_date'])
    	->join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')
    	->where('oex_students.id',Session::get('student_session'))->get()->first();
        $data['exams'] = Oex_student_exam_map::
        where('oex_student_exam_maps.user_id',Session::get('student_session'))
        ->get()->count();
        $data['exam_attended'] = Oex_result::
        where('oex_results.user_id',Session::get('student_session'))
        ->get()->count();
        $data['active_exams'] = Oex_student_exam_map::
        where('oex_student_exam_maps.user_id',Session::get('student_session'))
        ->where('oex_student_exam_maps.exam_date','=',date('Y-m-d'))
        ->get()->count();
        $data['student'] = Oex_students::
        where('oex_students.id',Session::get('student_session'))->get()->first();
    	return view('student.dashboard',$data);
    }

    public function exam()
    {
    	if(!Session::get('student_session'))
    	{
    		return redirect(url('student/signup'));
    	}
    	/*$student_info = Oex_students::select(['oex_students.*','oex_exam_masters.title','oex_exam_masters.exam_date'])
    	->join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')
    	->where('oex_students.id',Session::get('student_session'))->get()->first();*/
        $student_info =
        Oex_students::select(['oex_student_exam_maps.*','oex_students.*'])
        ->join('oex_student_exam_maps','oex_student_exam_maps.user_id','=','oex_students.id')
        ->where('oex_student_exam_maps.user_id',Session::get('student_session'))->get()->toArray();
        $stud_name = Oex_students::where('id',Session::get('student_session'))
        ->get()->first();
    	//$joined_exam = Oex_result::where('exam_id',$student_info->exam)->where('user_id',Session::get('student_session'))->get()->first();
    	return view('student.exam',['student_info'=>$student_info,'stud_name'=>$stud_name]);
    }

    public function join_exam($id)
    {
    	if(!Session::get('student_session'))
    	{
    		return redirect(url('student/signup'));
    	}

    	$data['all_questions'] = Oex_exam_question_master::where('exam_id',$id)->get()->toArray();
    	return view('student.join_exam',$data);
    }

    public function submit_question(Request $request)
    {
    	//echo "<pre>";
    	//print_r($request->all());
    	$yes_ans = 0;
    	$no_ans = 0;
    	$data = $request->all();
    	$result = array();
    	for($i=1;$i<=$request->index;$i++)
    	{
    		if(isset($data['question'.$i]))
    		{
    			$question = Oex_exam_question_master::where('id',$data['question'.$i])->get()->first();
    			if($question->ans == $data['ans'.$i])
    			{
    				$result[$data['question'.$i]]= 'YES';
    				$yes_ans++;
    			}
    			else
    			{
    				$result[$data['question'.$i]]= 'NO';
    				$no_ans++;
    			}
    		}
    	}
    	/*echo "<pre>";
    	print_r($result);
    	die();*/
    	/*echo $yes_ans;
    	echo "<br>";
    	echo $no_ans;
    	echo "<pre>";
    	//print_r($result);
    	print_r($request->all());*/
    	$res = new Oex_result();
    	$res->exam_id = $request->exam_id;
    	$res->user_id = Session::get('student_session');
    	$res->yes_ans = $yes_ans;
    	$res->no_ans = $no_ans;
    	$res->result_json = json_encode($result);
    	//echo $res->save();
    	$res->save();
    	//$this->show_result($res->id);

    	/****   
			here we need to create a flag of exam_submit = 1 in Oex_student_exam_map.
			if it is 1 and it is within the exam expairy date - the action box will
			show as - Exam Attended(in Green Color)
    	****/
        $exam_map = Oex_student_exam_map::where('exam_id',$request->exam_id)
        ->where('user_id',Session::get('student_session'))
        ->get()->first();
        $exam_map->exam_submit = 1;
        $exam_map->update();
    	//return redirect(url('student/show_result/'.$res->id));


    	return redirect(url('student/show_result/'.$res->exam_id));

    }

    public function show_result($id)
    {
    	$data['student_info'] = Oex_students::select(['oex_students.*','oex_exam_masters.title','oex_exam_masters.exam_date'])
    	->join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')
    	->where('oex_students.id',Session::get('student_session'))->get()->first();
    	//$data['result_info'] = Oex_result::where('id',$id)->get()->first();
    	$data['result_info'] = Oex_result::where('exam_id',$id)->where('user_id',Session::get('student_session'))->get()->first();
    	//echo "<pre>";
    	//print_r($result_info);
    	return view('student.show_result',$data);
    }

    public function model_answer($id)
    {
    	$data['all_qa'] = Oex_exam_question_master::where('exam_id',$id)->get()->toArray();
    	//echo "<pre>";
    	//print_r($data);
    	return view('student.model_answer',$data);
    }

    public function student_information($id)
    {
    	$data['student_info'] = Oex_students::where('id',$id)->get()->first();
    	//echo "<pre>";
    	//print_r($data);
    	//die();
    	return view('student.student_information',$data);
    }

    public function all_exam_results()
    {
    	//echo Session::get('student_session');

    	$data['all_exam_results'] = Oex_result::
        select(['oex_results.*','oex_exam_masters.title as exam_name','oex_exam_masters.exam_date as exam_date'])
        ->join('oex_exam_masters','oex_results.exam_id','=','oex_exam_masters.id')
        //->orderBy('id','desc')
        ->where('oex_results.user_id',Session::get('student_session'))
        ->get()->toArray();
    	return view('student.all_exam_results',$data);
    }

    public function logout(Request $request)
    {
    	 $request->session()->forget('student_session');
	     return redirect('student/signup');

    }
}
