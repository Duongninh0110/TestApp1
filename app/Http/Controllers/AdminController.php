<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class adminController extends Controller
{
    
    public function login(Request $request){

    	if($request->ismethod('post')){
    		$data = $request->all();
    		if(Auth::attempt(['email'=>$data['email'], 'password' => $data['password'], 'admin' =>'1'])){
    			return redirect('/');
    		}else{
    			return redirect('admin')->with('flash_message_error', 'Password or Email is incorrect');
    		}
    	}

    	return view('admin.admin_login');
    }
}
