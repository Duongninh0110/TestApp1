<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class IndexController extends Controller
{
    public function index()
    {        
        $products = Product::where(['status'=>1])->get();
        return view('index')->with('products', $products);
    }
}
