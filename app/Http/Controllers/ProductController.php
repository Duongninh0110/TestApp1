<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
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
            $product->category_id = $data['category_id'];
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
            if (empty($data['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }

            $product->status = $status;
            $product->save();

            return redirect('admin/view-products')
                ->with('flash_message_success', 'The product has been added successfully');
        }

        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option selected disabled>Select</option>";
        foreach ($categories as $cat) {
            $categories_dropdown .= "<option value=".$cat->id.">".$cat->name."</option>";
            $subcategories = Category::where(['parent_id'=>$cat['id']])->get();
            foreach ($subcategories as $subcat) {
                $categories_dropdown .= "<option value=".$subcat->id.">--".$subcat->name."</option>";
            }
        }
        return view('admin.products.add_product')->with('categories_dropdown', $categories_dropdown);
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
            $productDetails->category_id = $data['category_id'];
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
            if (empty($data['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }

            $productDetails->status = $status;
            $productDetails->save();
            return redirect('admin/view-products')
                ->with('flash_message_success', 'The product has been edited successfully');
        }

        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option selected disabled>Select</option>";
        foreach ($categories as $cat) {
            if ($cat->id == $productDetails->category_id) {
                $select='selected';
            } else {
                $select = '';
            }

            $categories_dropdown .= "<option value='".$cat->id."'". $select.">".$cat->name."</option>";
            $subcategories = Category::where(['parent_id'=>$cat['id']])->get();
            foreach ($subcategories as $subcat) {
                if ($subcat->id == $productDetails->category_id) {
                    $select='selected';
                } else {
                    $select = '';
                }
                $categories_dropdown .= "<option value='".$subcat->id."'". $select.">--".$subcat->name."</option>";
            }
        }
        return view('admin.products.edit_product')->with('productDetails', $productDetails)
            ->with('categories_dropdown', $categories_dropdown);
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product ->delete();
        return redirect()->back()->with('flash_message_success', 'The Product has been deleted successfully');
    }
    public function productDetails($id)
    {
        $allCategories=Category::with('categories')->where(['parent_id'=>'0', 'status'=>1])->get();
        $productDetails = Product::find($id);
        return view('products.details')->with('productDetails', $productDetails)->with('allCategories', $allCategories);
    }
    public function productList($url = null)
    {
        $countCategories=Category::where(['url'=>$url])->count();
        // echo $countCategories; die;
        if ($countCategories==0) {
            abort('404');
        }
        $allCategories=Category::with('categories')->where(['parent_id'=>'0'])->get();
        $categoryDetails = Category::where('url', $url)->first();
        $categoryDetails = json_decode(json_encode($categoryDetails));
        if ($categoryDetails->parent_id==0) {
            $subCategories=Category::where(['parent_id'=> $categoryDetails->id])->get();
            $subcat_ids = [];
            $subcat_ids[] = $categoryDetails->id;
            foreach ($subCategories as $subcat) {
                $subcat_ids[] =$subcat->id;
            }
            $products = Product::whereIn('category_id', $subcat_ids)->where(['status'=>1])->get();
        } else {
            $products = Product::where(['category_id'=> $categoryDetails->id])->where(['status'=>1])->get();
        }
        return view('products.listing')->with('categoryDetails', $categoryDetails)
            ->with('products', $products)->with('allCategories', $allCategories);
    }
}
