<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    public function get()
    {
    	if (Auth::check())
		{
		   return redirect()->route('admin');
		}
    	return view('admin.login');
    }

    public function post(Request $request)
    {
    	$rules = [
    		'username' => 'required | min : 4 | max : 25 ',
    		'password' => 'required | min: 8'
    	];

    	$msg = [
		    'required' => ':attribute không được bỏ trống.',
		    'password.min' => 'Password phải lớn hơn :min ký tự.',
		    'username.min' => 'Username phải lớn hơn :min ký tự.',
		    'username.max' => 'Username phải nhỏ hơn :max ký tự.',
		];
	
    	$validator = Validator::make($request->all(), $rules , $msg);

    	if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } else {
        	$username = $request->input('username');
        	$password = $request->input('password');
        	
        	if( Auth::attempt(['name' => $username, 'password' => $password], $request->input('remember') ) ){

        		return redirect()->route('admin');

        	} else {

        		$msg = new MessageBag(['errlogin'=> 'Sai thông tin đăng nhập.']);
        		return redirect()->back()->withErrors($msg);
        	}
        }
    }
}
