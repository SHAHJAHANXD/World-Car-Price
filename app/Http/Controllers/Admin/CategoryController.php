<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function categories()
    {
        if (Auth::user()->role == 'Admin') {
            $category = Category::get();
            return view('admin.categories.index', compact('category'));
        } else {
            return redirect()->back()->with('error', 'Role is invalid!');
        }

    }
    public function edit_categories($id)
    {
        $category = category::where('id', $id)->first();
        return view('admin.categories.edit', compact('category','id'));
    }


    public function post_categories(Request $request)
    {
        $category = new category();
        $category->category_name = $request->category_name;
        if ($request->hasfile('category_image')) {
            $imageName = env('APP_URL') . 'images/categories/' . time() . '.' . $request->category_image->extension();
            $category->category_image = $imageName;
            $request->category_image->move(public_path('images/categories'),  $imageName);
        }
        $category->save();
        return redirect()->back()->with('success','Category created successfully!');
    }
    public function post_edit_categories(Request $request)
    {
        $category = category::where('id', $request->id)->first();
        $category->category_name = $request->category_name;
        if ($request->hasfile('category_image')) {
            $imageName = env('APP_URL') . 'images/categories/' . time() . '.' . $request->category_image->extension();
            $category->category_image = $imageName;
            $request->category_image->move(public_path('images/categories'),  $imageName);
        }
        $category->save();
        return redirect()->route('admin.categories')->with('success','Category updated successfully!');
    }

    public function activeCategory($id)
    {
        $category = category::where('id' , $id)->first();
        $category->category_status = 1;
        $category->save();
        return redirect()->back()->with('success','Status updated successfully!');
    }
    public function blockCategory($id)
    {
        $category = category::where('id' , $id)->first();
        $category->category_status = 0;
        $category->save();
        return redirect()->back()->with('success','Status updated successfully!');
    }
    public function deletecategories($id)
    {
        $category = category::where('id' , $id)->first();
        $category->delete();
        return redirect()->back()->with('success','Record deleted successfully!');
    }
}
