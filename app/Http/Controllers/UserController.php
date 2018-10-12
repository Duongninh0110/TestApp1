<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function registerAndLogin(){
    	return view('users.login_register');
    }

    public function register(Request $request){

    	if($request->ismethod('post')){

    		$validatedData = $request->validate([
            'name' => 'required|alpha_spaces',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
            
            ]);

    		$data = $request->all();

    		$countEmail = User::where(['email'=>$data['email']])->count();
    		if($countEmail>0){
    			return redirect()->back()->with('flash_message_error', 'The email already has been used');
    		}

    		$user = new User;
    		$user->name = $data['name'];
    		$user->email = $data['email'];
    		$user->password = Hash::make($data['password']);
    		$user->admin = 0;

    		$user->save();

    		

    		if(auth::attempt(['email'=> $data['email'],'password'=>$data['password']])){
				Session::put('frontend', $data['email']);
    			return redirect('/')->with('flash_message_success', 'The user hase been added successfully');
    		}    		
    	}

    }

    public function login(Request $request){

    	if($request->ismethod('post')){

    		$data = $request->all();

    		if(auth::attempt(['email'=> $data['email'],'password'=>$data['password']])){
				Session::put('frontend', $data['email']);
    			return redirect('/');
    		}else{
    			return rediect('/login-register')->with('flash_message_error', 'Email or password wrong');
    		}    		
    	}

    }

    public function logout(){
    	Session::forget('frontend');
    	auth::logout();
    	return redirect('/login-register');
    }
}
