<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use Session;

class AdminController extends Controller
{
    public function dashboard()
    {

        $products = Product::get();
        return view('admin.dashboard')->with('products', $products);
    }
}
