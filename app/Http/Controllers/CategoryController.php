<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        if ($request->ismethod('post')) {
            $data = $request->all();
            $Category = new Category;
            $Category->parent_id = $data['parent_id'];
            $Category->name = $data['category_name'];
            $Category->description = $data['description'];
            $Category->url = $data['url'];
            
            if (empty($data['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }
            $Category->status = $status;

            $Category->save();

            return redirect('admin/view-categories')
                ->with('flash_message_success', 'This  Category has been added succesfully');
        }

        $levels = Category::get();
        return view('admin.Categories.add_category')->with('levels', $levels);
    }

    public function viewCategories()
    {
        $categories = Category::get();
        return view('admin.Categories.view_categories')->with('categories', $categories);
    }

    public function editCategory(Request $request, $id)
    {
        $categoryDetails = Category::find($id);

        if ($request->ismethod('post')) {
            $data = $request->all();
            $categoryDetails->parent_id = $data['parent_id'];
            $categoryDetails->name = $data['category_name'];
            $categoryDetails->description = $data['description'];
            $categoryDetails->url = $data['url'];
            
            if (empty($data['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }
            $categoryDetails->status = $status;

            $categoryDetails->save();

            return redirect('admin/view-categories')
                ->with('flash_message_success', 'This  Category has been added succesfully');
        }

        $levels = Category::get();
        return view('admin.categories.edit_category')
            ->with('levels', $levels)->with('categoryDetails', $categoryDetails);
    }

    public function deleteCategory($id)
    {
        $Category = Category::find($id);
        $Category ->delete();
        return redirect('admin/view-categories')
            ->with('flash_message_success', 'This  Category has been deleted succesfully');
    }
}
