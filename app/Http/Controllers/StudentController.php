<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Oex_students;

class StudentController extends Controller
{
    
    public function student_signup()
    {
    	return view('student.signup');
    }

    public function login_sub(Request $request)
    {
    	$student = Oex_students::where('email',$request->email)
    	->where('password',$request->password)->get()->toArray();
    	if($student)
    	{
    		//print_r($portal);
    		if($student[0]['status'] == 1)
    		{
    			$request->session()->put('student_session',$student[0]['id']);
    			$arr = array('status' => 'true', 'message' => 'Login Successful', 'reload' => url('student/dashboard'));

    		}
    		else
    		{
    			$arr = array('status' => 'false', 'message' => 'Account Deactivated');
    		}
    	}
    	else
    	{
    			$arr = array('status' => 'false', 'message' => 'Invalid Email/Password');
    	}

    	echo json_encode($arr);
    }

}
