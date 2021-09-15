<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Auth;

use App\Oex_exam_master;

use Validator;

use App\Oex_students;

use PDF;

class PortalOperation extends Controller
{
    //
   
    public function dashboard()
    {
    	if(!Session::get('portal_user'))
    	{
    		return redirect(url('portal/login'));
    	}
    	//echo $session_data = Session::get('portal_user');
    	//die();
    	$data['portal_exams'] = Oex_exam_master::
    	select(['oex_exam_masters.*','oex_categories.name as cat_name'])
    	->join('oex_categories','oex_exam_masters.category','=','oex_categories.id')
    	->orderBy('id','desc')->where('oex_exam_masters.status','1')->get()->toArray();
    	return view('portal.dashboard',$data);

    }

    public function exam_form($id)
    {
    	//echo $id;
    	$data['id'] = $id;
    	$exam_info = Oex_exam_master::where('id',$id)->get()->first();
    	$data['exam_title'] = $exam_info->title;
    	$data['exam_date'] = $exam_info->exam_date;
    	return view('portal.exam_form',$data);
    }

    public function exam_form_sub(Request $request)
    {
    	$validator = Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','password'=>'required','dob'=>'required']);
        if($validator->passes())
        {
            $student = new Oex_students();
            $student->name = $request->name;
            $student->email = $request->email;
            $student->mobile_no = $request->mobile_no;
            $student->dob = $request->dob;
            $student->exam = $request->id;
            $student->password = $request->password;
            $student->status = 1;
            $student->save();
            $arr = array('status' => 'true', 'message' => 'Data Successfully Added', 'reload' => url('portal/print/'.$student->id));

        }
        else
        {
            $arr = array('status' => 'false', 'message' => $validator->errors()->all());
        }

        echo json_encode($arr);
    }

    public function print($id)
    {
    	$ref_id = $id;
    	$std_info = Oex_students::where('id',$id)->get()->first();
    	$exam_title = Oex_exam_master::where('id',$std_info->exam)->get()->first()->title;
    	$exam_date = Oex_exam_master::where('id',$std_info->exam)->get()->first()->exam_date;
    	//echo "<pre>";
    	//print_r($std_info);
    	return view('portal.print',['std_info'=>$std_info,'exam_title'=>$exam_title,'exam_date'=>$exam_date,'ref_id'=>$ref_id]);
    }

    public function printpdf($id)
    {
    	//echo $id;
    	$std_info = Oex_students::where('id',$id)->get()->first();
    	$exam_info = Oex_exam_master::where('id',$std_info->exam)->get()->first();
    	$pdf = PDF::loadView('portal.pdf', compact('std_info','exam_info'));
      	return $pdf->download('student_exam_info.pdf');
    }

    public function update_form()
    {
    	$data['exams']=Oex_exam_master::where('status','1')->get()->toArray();
    	return view('portal.update_form',$data);
    }

    public function student_exam_info()
    {
    	//print_r($_GET);
    	$exam_info = Oex_exam_master::where('id',$_GET['exam'])->get()->first();
    	$student_info = Oex_students::where('mobile_no',$_GET['mobile_no'])->where('dob',$_GET['dob'])->where('exam',$_GET['exam'])->get()->toArray();
    	if($student_info)
    	{
    		return view('portal.student_exam_info',['exam_info'=>$exam_info,'student_info'=>$student_info]);
    	}
    	else
    	{
    		return view('portal.no_record');
    	}
	    
    }

    public function student_exam_info_edit(Request $request)
    {
    	$student = Oex_students::where('id',$request->id)->get()->first();
    	$validator = Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','dob'=>'required']);
        if($validator->passes())
        {
            $student->name = $request->name;
            $student->email = $request->email;
            $student->mobile_no = $request->mobile_no;
            $student->dob = $request->dob;
            if($request->password!='')
	        {
	            $student->password = $request->password;
	        }
	        $student->status = 1;
            $student->update();
            $arr = array('status' => 'true', 'message' => 'Student Data Successfully Updated', 'reload' => url('portal/update_form'));

        }
        else
        {
            $arr = array('status' => 'false', 'message' => $validator->errors()->all());
        }

        echo json_encode($arr);
    }

    public function printdata($id)
    {
    	$ref_id = $id;
    	$std_info = Oex_students::where('id',$id)->get()->first();
    	$exam_info = Oex_exam_master::where('id',$std_info->exam)->get()->first();
    	$exam_title = $exam_info->title;
    	$exam_date = $exam_info->exam_date;
    	//echo "<pre>";
    	//print_r($std_info);
    	return view('portal.print',['std_info'=>$std_info,'exam_title'=>$exam_title,'exam_date'=>$exam_date,'ref_id'=>$ref_id]);
    }



    /*public function logout()
    {
    	Auth::logout();
    	Session::flush();
    	//Session::forget('portal_user');

    	return redirect(url('portal/login'));

    }*/

	public function logout(Request $request) {
	    /*header("cache-Control: no-store, no-cache, must-revalidate");
	    header("cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
	    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	    Session::flush();
	    $request->session()->regenerate();
	    //Session::flash('succ_message', 'Logged out Successfully');
	    return redirect('portal/login');*/

	     $request->session()->forget('portal_user');
	     return redirect('portal/login');
		}
}
		