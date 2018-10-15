<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;
use Image;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        if ($request->ismethod('post')) {
            $validatedData = $request->validate([
            'product_name' => 'required|alpha_spaces|max:100',
            'description' => 'required|my_alpha|max:300',
            'price' => 'required|integer|digits_between:1,10',
            'image' => 'required|mimes:jpeg,gif,png|max:10240'
            ]);

           
            $data = $request->all();
            
            $product = new Product;
            $product->name = $data['product_name'];
            $product->description = $data['description'];
            $product->price = $data['price'];
            //upload images
            if ($request->hasFile('image')) {
                $image_tmp = Input::file('image');
                // dd($image_tmp);
                if ($image_tmp->isvalid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $image_path = 'images/backend_images/products/'.$filename;
                    // dd($image_path);
                    //resize images
                    Image::make($image_tmp)->resize(285, 405)->save($image_path);
                    //store images
                    $product->photo = $filename;
                }
            }
            $product->save();

            return redirect('admin/view-products')
                ->with('flash_message_success', 'The product has been added successfully');
        }
        
        return view('admin.products.add_product');
    }

    public function viewProducts()
    {
        $products = Product::get();
        return view('admin.products.view_products')->with('products', $products);
    }

    public function editProduct(Request $request, $id)
    {
        $productDetails = Product::find($id);
        if ($request->ismethod('post')) {
            $validatedData = $request->validate([
            'product_name' => 'required|alpha_spaces|max:100',
            'description' => 'required|my_alpha|max:300',
            'price' => 'required|integer|digits_between:1,10',
            'image' => 'mimes:jpeg,gif,png|max:10240'
            ]);
            $data = $request->all();
            $productDetails->name = $data['product_name'];
            $productDetails->description = $data['description'];
            $productDetails->price = $data['price'];

            if ($request->hasFile('image')) {
                $image_tmp = Input::file('image');
                if ($image_tmp->isvalid()) {
                    $extension = $image_tmp->getClientOriginalExtension($image_tmp);
                    $filename = time().".".$extension;
                    $image_path = "images/backend_images/products/".$filename;
                    Image::make($image_tmp)->resize(285, 405)->save($image_path);
                    $productDetails->photo =  $filename;
                }
            }

            $productDetails->save();
            return redirect('admin/view-products')
                ->with('flash_message_success', 'The product has been edited successfully');
        }
        
        return view('admin.products.edit_product')->with('productDetails', $productDetails);
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product ->delete();
        return redirect()->back()->with('flash_message_success', 'The Product has been deleted successfully');
    }
    public function productDetails($id)
    {
        
        $productDetails = Product::find($id);
        return view('products.details')->with('productDetails', $productDetails);
    }
}
