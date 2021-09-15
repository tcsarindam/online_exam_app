<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Oex_category;

use App\Oex_exam_master;

use App\Oex_students;

use App\Oex_portal;

use App\Oex_exam_question_master;

use App\Oex_student_exam_map;

use App\model\Oex_result;

use Validator;

class Admin extends Controller
{
    public function index()
    {
    	//echo "Index function of Admin";
        $data['students'] = Oex_students::get()->count();
        $data['exams'] = Oex_exam_master::get()->count();
        $data['active_exams'] = Oex_exam_master::where('exam_date','=',date('Y-m-d'))->get()->count();
        $data['results'] = Oex_result::get()->count();
        $data['page_name'] = 'dashboard';
    	return view('admin.dashboard',$data);
    }
    // Exam category section starts...................
    public function exam_category()
    {
    	//echo "exam category";
        $data['category'] = Oex_category::orderBy('id','desc')->get()->toArray();
        //print_r($data['category']);
        //die();
        $data['page_name'] = 'exam_category';
    	return view('admin.exam_category',$data);
    }

   public function add_new_category(Request $request)
   {
        //print_r($request->all()); 
        //it is used to debugging purpose to get the value in fb in AJAX.

       $validator = Validator::make($request->all(),['name'=>'required']);
        if($validator->passes())
        {
            $cat = new Oex_category();
            $cat->name = $request->name;
            $cat->status = 1;
            $cat->save();
            $arr = array('status' => 'true', 'message' => 'Exam Category Successfully Added', 'reload' => url('admin/exam_category'));

        }
        else
        {
            $arr = array('status' => 'false', 'message' => $validator->errors()->all());
        }

        echo json_encode($arr);

    }

    public function delete_category($id)
    {
        //echo $id;
        $cat = Oex_category::where('id',$id)->get()->first();
        $cat->delete();
        return redirect(url('admin/exam_category'));
    }

    public function edit_category($id)
    {
        //echo $id;
        $cat = Oex_category::where('id',$id)->get()->first();
        /*echo "<pre>";
        print_r($cat->name);*/
        return view('admin.edit_category',['category'=>$cat]);
    }

    public function edit_new_category(Request $request)
    {
        //print_r($request->all());
        $cat = Oex_category::where('id',$request->id)->get()->first();
        $cat->name = $request->name;
        $cat->update();
        $arr = array('status' => 'true', 'message' => 'Exam Category Successfully Updated', 'reload' => url('admin/exam_category'));
        echo json_encode($arr);

    }

    public function category_status($id)
    {
        $cat = Oex_category::where('id',$id)->get()->first();
        if($cat->status == 1)
        {
            $status= 0;
        }
        else
        {
            $status =1;
        }

        $cat1 = Oex_category::where('id',$id)->get()->first();
        $cat1->status = $status;
        $cat1->update();
    }

    // Category section ends.................

    // Exam Master Starts.....................

    public function manage_exam()
    {
        $data['category'] = Oex_category::orderBy('id','desc')->where('status','1')->get()->toArray();
        $data['exams'] = Oex_exam_master::
        select(['oex_exam_masters.*','oex_categories.name as cat_name'])
        ->join('oex_categories','oex_exam_masters.category','=','oex_categories.id')
        ->orderBy('id','desc')
        //->where('oex_exam_masters.status','1')
        ->get()->toArray();
        //print_r($data['category']);
        //die();
        $data['page_name'] = 'manage_exam';
        return view('admin.manage_exam',$data);
    }

    public function add_new_exam(Request $request)
    {
        $validator = Validator::make($request->all(),['title'=>'required','exam_category'=>'required','exam_date'=>'required']);
        if($validator->passes())
        {
            $exam = new Oex_exam_master();
            $exam->title = $request->title;
            $exam->category = $request->exam_category;
            $exam->exam_date = $request->exam_date;
            $exam->status = 1;
            $exam->save();
            $arr = array('status' => 'true', 'message' => 'Exam Data Successfully Added', 'reload' => url('admin/manage_exam'));

        }
        else
        {
            $arr = array('status' => 'false', 'message' => $validator->errors()->all());
        }

        echo json_encode($arr);


    }

    public function delete_exam($id)
    {
        $exam = Oex_exam_master::where('id',$id)->get()->first();
        $exam->delete();
        return redirect(url('admin/manage_exam'));
    }

    public function edit_exam($id)
    {
        $data['exam1'] = Oex_exam_master::where('id',$id)->get()->first();
        /*echo "<pre>";
        print_r($cat->name);*/
        $data['category'] = Oex_category::orderBy('id','desc')->where('status','1')->get()->toArray();
        return view('admin.edit_exam',$data);
    }

    public function edit_exam_sub(Request $request)
    {
        $exam = Oex_exam_master::where('id',$request->id)->get()->first();
        $exam->title = $request->title;
        $exam->exam_date = $request->exam_date;
        $exam->category = $request->exam_category;
        $exam->update();
        $arr = array('status' => 'true', 'message' => 'Exam Data Successfully Updated', 'reload' => url('admin/manage_exam'));
        echo json_encode($arr);
    }

    public function exam_status($id)
    {
        $exam = Oex_exam_master::where('id',$id)->get()->first();
        if($exam->status == 1)
        {
            $status= 0;
        }
        else
        {
            $status =1;
        }

        $exam1 = Oex_exam_master::where('id',$id)->get()->first();
        $exam1->status = $status;
        $exam1->update();
    }

    public function add_question($id)
    {
        $data['questions'] = Oex_exam_question_master::
        where('exam_id',$id)
        ->get()->toArray();  
        return view('admin.add_question',$data);
    }

    public function add_new_question(Request $request)
    {
         $validator = Validator::make($request->all(),['question'=>'required','option1'=>'required','option2'=>'required','option3'=>'required','option4'=>'required','ans'=>'required']);
        if($validator->passes())
        {
            $question = new Oex_exam_question_master();
            $question->exam_id = $request->exam_id;
            $question->question = $request->question;
            $question->ans = $request->ans;
            $question->options = json_encode(array('option1'=>$request->option1,'option2'=>$request->option2,'option3'=>$request->option3,'option4'=>$request->option4));
            $question->status = 1;
            $question->save();
            $arr = array('status' => 'true', 'message' => 'Question Added', 'reload' => url('admin/add_question/'.$request->exam_id));

        }
        else
        {
            $arr = array('status' => 'false', 'message' => $validator->errors()->all());
        }

        echo json_encode($arr);
    }

    public function exam_question_status($id)
    {
        $question = Oex_exam_question_master::where('id',$id)->get()->first();
        if($question->status == 1)
        {
            $status= 0;
        }
        else
        {
            $status =1;
        }

        $question1 = Oex_exam_question_master::where('id',$id)->get()->first();
        $question1->status = $status;
        $question1->update();  
    }

    public function delete_question($id)
    {
        $question = Oex_exam_question_master::where('id',$id)->get()->first();
        $exam_id = $question->exam_id;
        $question->delete();
        return redirect(url('admin/add_question/'.$exam_id));
    }

    public function edit_question($id)
    {
        $data['question']=Oex_exam_question_master::where('id',$id)->get()->toArray();
        return view('admin.edit_question',$data);
    }

    public function edit_question_sub(Request $request)
    {
         $question = Oex_exam_question_master::where('id',$request->id)->get()->first();
         $question->question = $request->question;
         $question->ans = $request->ans;
         $question->options = json_encode(array('option1'=>$request->option1,'option2'=>$request->option2,'option3'=>$request->option3,'option4'=>$request->option4));
         $question->update();
         $arr = array('status' => 'true', 'message' => 'Question Updated Successfully', 'reload' => url('admin/add_question/'.$question->exam_id));
         echo json_encode($arr);
    }

    public function add_exam_student($id)
    {
        //echo $id;
        $data['exam1'] = Oex_exam_master::where('id',$id)->get()->first();
        $data['students'] = Oex_students::where('status','1')->get()->toArray();
        return view('admin.add_exam_student',$data);

    }

    public function add_exam_student_sub(Request $request)
    {
         $validator = Validator::make($request->all(),['user_id'=>'required']);
        if($validator->passes())
        {
            $map_exists= Oex_student_exam_map::where('exam_id',$request->exam_id)
            ->where('user_id',$request->user_id)
            ->get()->toArray();
                if($map_exists)
                {
                     $arr = array('status' => 'false', 'message' => 'Exam already assigned to this student');
                     
                }
            
                else
                {
                    $exam_map = new Oex_student_exam_map();
                    $exam_map->title = $request->title;
                    $exam_map->exam_date = $request->exam_date;
                    $exam_map->exam_id = $request->exam_id;
                    $exam_map->user_id = $request->user_id;
                    $exam_map->status = 1;
                    $exam_map->save();
                    $arr = array('status' => 'true', 'message' => 'Exam Assigned Successfully', 'reload' => url('admin/manage_exam'));
                }

        }
        else
        {
            $arr = array('status' => 'false', 'message' => $validator->errors()->all());
        }

        echo json_encode($arr);
    }

    public function all_assigned_exams()
    {
        $data['all_assigned_exams'] =
        Oex_students::select(['oex_student_exam_maps.title','oex_student_exam_maps.exam_date','oex_student_exam_maps.id as record_id','oex_student_exam_maps.exam_submit','oex_students.name'])
        ->join('oex_student_exam_maps','oex_student_exam_maps.user_id','=','oex_students.id')
        ->get()->toArray();
        return view('admin.all_assigned_exams',$data);
    }

    // Exam master module ends ...........

    // Student module starts.............

    public function manage_students()
    {
        $data['category'] = Oex_category::orderBy('id','desc')->where('status','1')->get()->toArray();
        $data['exams'] = Oex_exam_master::orderBy('id','desc')->where('status','1')->get()->toArray();
        $data['students'] = Oex_students::
        select(['oex_students.*','oex_exam_masters.title as exam_name','oex_exam_masters.exam_date as exam_date'])
        ->join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')
        ->orderBy('id','desc')
        ->get()->toArray();
        /*echo "<pre>";
        print_r($data['students']);
        die();*/
        $data['page_name'] = 'manage_students';
        return view('admin.manage_students',$data);
    }

    public function add_new_student(Request $request)
    {
        $validator = Validator::make($request->all(),['name'=>'required','email'=>'required','dob'=>'required','mobile_no'=>'required','exam'=>'required','password'=>'required']);
        if($validator->passes())
        {
            $student = new Oex_students();
            $student->name = $request->name;
            $student->email = $request->email;
            $student->mobile_no = $request->mobile_no;
            $student->dob = $request->dob;
            //$student->exam = $request->exam;
            $student->password = $request->password;
            $student->status = 1;
            $student->save();
            $arr = array('status' => 'true', 'message' => 'Student Data Successfully Added', 'reload' => url('admin/manage_students'));

        }
        else
        {
            $arr = array('status' => 'false', 'message' => $validator->errors()->all());
        }

        echo json_encode($arr);
    }

    public function edit_student($id)
    {
        $data['student'] = Oex_students::where('id',$id)->get()->first();
        $data['exams'] = Oex_exam_master::orderBy('id','desc')->where('status','1')->get()->toArray();
        return view('admin.edit_student',$data);
    }

    public function edit_student_sub(Request $request)
    {
        $student = Oex_students::where('id',$request->id)->get()->first();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->mobile_no = $request->mobile_no;
        $student->dob = $request->dob;
        $student->exam = $request->exam;
        if($request->password!='')
        {
            $student->password = $request->password;
        }
        $student->update();
        $arr = array('status' => 'true', 'message' => 'Student Data Successfully Updated', 'reload' => url('admin/manage_students'));
        echo json_encode($arr);
    }

    public function delete_student($id)
    {
        $student = Oex_students::where('id',$id)->get()->first();
        $student->delete();
        return redirect(url('admin/manage_students'));
    }

    public function student_status($id)
    {
        $student = Oex_students::where('id',$id)->get()->first();
        if($student->status == 1)
        {
            $status= 0;
        }
        else
        {
            $status =1;
        }

        $student1 = Oex_students::where('id',$id)->get()->first();
        $student1->status = $status;
        $student1->update();
    }


    // Student module ends ..................

    // Result Module Starts ................

    public function all_student_results()
    {
        $data['all_exam_results'] = Oex_result::
        select(['oex_results.*','oex_exam_masters.title as exam_name','oex_exam_masters.exam_date as exam_date','oex_students.name as stud_name'])
        ->join('oex_exam_masters','oex_results.exam_id','=','oex_exam_masters.id')
        ->join('oex_students','oex_results.user_id','=','oex_students.id')
        //->where('oex_results.user_id',Session::get('student_session'))
        ->get()->toArray();
        $data['page_name'] = 'all_student_results';
        return view('admin.all_student_results',$data);

    }

    public function search_result()
    {
        $data['students'] = Oex_students::get()->toArray();
        return view('admin.search_result',$data);
    }

    public function search_result_sub(Request $request)
    {
        //print_r($request->all()); 
        //echo $request->user_id;
        $data['all_exam_results'] = Oex_result::
        select(['oex_results.*','oex_exam_masters.title as exam_name','oex_exam_masters.exam_date as exam_date','oex_students.name as stud_name'])
        ->join('oex_exam_masters','oex_results.exam_id','=','oex_exam_masters.id')
        ->join('oex_students','oex_results.user_id','=','oex_students.id')
        ->where('oex_results.user_id',$request->user_id)
        ->get()->toArray();
        return view('admin.search_result_sub',$data);
    }   



    // Result Module Ends ..................

    // Portal User module starts.................

    public function manage_portal()
    {
        $data['portals'] = Oex_portal::orderBy('id','desc')->get()->toArray();
        //print_r($data['category']);
        //die();
        $data['page_name'] = 'manage_portal';
        return view('admin.manage_portal',$data);
    }

    public function add_new_portal(Request $request)
    {
        $validator = Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','password'=>'required']);
        if($validator->passes())
        {
            $portal = new Oex_portal();
            $portal->name = $request->name;
            $portal->email = $request->email;
            $portal->mobile_no = $request->mobile_no;
            $portal->password = $request->password;
            $portal->status = 1;
            $portal->save();
            $arr = array('status' => 'true', 'message' => 'Portal Data Successfully Added', 'reload' => url('admin/manage_portal'));

        }
        else
        {
            $arr = array('status' => 'false', 'message' => $validator->errors()->all());
        }

        echo json_encode($arr);  
    }

    public function edit_portal($id)
    {
        $data['portal'] = Oex_portal::where('id',$id)->get()->first();
        return view('admin.edit_portal',$data);
    }

    public function edit_portal_sub(Request $request)
    {
        $portal = Oex_portal::where('id',$request->id)->get()->first();
        $portal->name = $request->name;
        $portal->email = $request->email;
        $portal->mobile_no = $request->mobile_no;
        if($request->password!='')
        {
            $portal->password = $request->password;
        }
        $portal->update();
        $arr = array('status' => 'true', 'message' => 'Portal Data Successfully Updated', 'reload' => url('admin/manage_portal'));
        echo json_encode($arr);    
    }

    public function delete_portal($id)
    {
        $portal = Oex_portal::where('id',$id)->get()->first();
        $portal->delete();
        return redirect(url('admin/manage_portal'));
    }

    public function portal_status($id)
    {
        $portal = Oex_portal::where('id',$id)->get()->first();
        if($portal->status == 1)
        {
            $status= 0;
        }
        else
        {
            $status =1;
        }

        $portal1 = Oex_portal::where('id',$id)->get()->first();
        $portal1->status = $status;
        $portal1->update();
    }


    // Portal User module ends...................

}
