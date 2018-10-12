<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;

class AdminController extends Controller
{
    
    public function login(Request $request)
    {
        if ($request->ismethod('post')) {
            $data = $request->all();
            if (Auth::attempt(['email'=>$data['email'], 'password' => $data['password'], 'admin' =>'1'])) {
                return redirect('admin/dashboard');
            } else {
                return redirect('admin')->with('flash_message_error', 'Password or Email is incorrect');
            }
        }

        return view('admin.admin_login');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('admin');
    }

    public function dashboard()
    {

        $products = Product::where(['status'=>1])->get();
        return view('admin.dashboard')->with('products', $products);
    }
}
