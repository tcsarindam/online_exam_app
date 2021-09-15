<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Oex_portal;

use Validator;

use Session;

class PortalController extends Controller
{
    public function portal_signup()
    {
    	//echo "sign up";
    	if(Session::get('portal_user'))
    	{
    		return redirect(url('portal/dashboard'));
    	}
    	return view('portal.signup');
    }

    public function signup_sub(Request $request)
    {
    	//print_r($request->all());
    	//die();
    	$validator = Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','password'=>'required']);
        if($validator->passes())
        {
        	
        	$user_exists= Oex_portal::where('email',$request->email)->get()->toArray();
        	if($user_exists)
        	{
        		 $arr = array('status' => 'false', 'message' => 'Email Already Exists');
        	}
        	else
        	{
        		$portal = new Oex_portal();
            	$portal->name = $request->name;
            	$portal->email = $request->email;
            	$portal->mobile_no = $request->mobile_no;
            	$portal->password = $request->password;
            	$portal->status = 1;
            	$portal->save();
            	$arr = array('status' => 'true', 'message' => 'Registration Successful', 'reload' => url('portal/login'));
        	}            

        }
        else
        {
            $arr = array('status' => 'false', 'message' => $validator->errors()->all());
        }

        echo json_encode($arr);  
    }

    public function login()
    {
    	//echo "login";
    	if(Session::get('portal_user'))
    	{
    		return redirect(url('portal/dashboard'));
    	}
    	return view('portal.login');
    }

    public function login_sub(Request $request)
    {
    	//print_r($request->all());
    	$portal = Oex_portal::where('email',$request->email)
    	->where('password',$request->password)->get()->toArray();
    	if($portal)
    	{
    		//print_r($portal);
    		if($portal[0]['status'] == 1)
    		{
    			$request->session()->put('portal_user',$portal[0]['id']);
    			$arr = array('status' => 'true', 'message' => 'Login Successful', 'reload' => url('portal/dashboard'));

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
