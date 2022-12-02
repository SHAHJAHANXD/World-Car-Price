<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function category()
    {
        $category = BlogCategory::get();
        return view('admin.blog.category', compact('category'));
    }
    public function list()
    {
        $list = Blog::get();
        return view('admin.blog.list', compact('list'));
    }

    public function post_category(Request $request)
    {
        $category = new BlogCategory();
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('success', 'Data Saved Successfully!');
    }
    public function create()
    {
        $category = BlogCategory::get();
        return view('admin.blog.create', compact('category'));
    }
    public function post_blog(Request $request)
    {
        $product = new Blog();
        $product->user_id = Auth::user()->id;
        $product->user_name = Auth::user()->name;
        $product->user_email = Auth::user()->email;
        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->meta_title = $request->meta_title;
        $product->meta_keyword = $request->meta_keyword;
        $product->meta_description = $request->meta_description;
        $product->desciption = $request->desciption;
        $product->category = $request->category;
        if ($request->hasfile('thumb_image')) {
            $imageName = '/' . 'images/blogs/' . time() . '.' . $request->thumb_image->extension();
            $product->thumb_image = $imageName;
            $request->thumb_image->move(public_path('images/blogs'),  $imageName);
        }
        $product->save();
        return redirect()->back()->with('success', 'Record Saved Succesfully!');
    }
    public function delete($id)
    {
        $blog = Blog::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Record Deleted Successfully');
    }
}
