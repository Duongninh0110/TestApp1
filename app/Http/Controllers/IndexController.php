<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class IndexController extends Controller
{
    public function index()
    {
        $allCategories=Category::with('categories')->where(['parent_id'=>'0', 'status'=>1])->get();
        $products = Product::where(['status'=>1])->get();
        return view('index')->with('products', $products)->with('allCategories', $allCategories);
    }
}
