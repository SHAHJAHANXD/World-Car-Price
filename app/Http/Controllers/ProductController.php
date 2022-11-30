<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\category;
use App\Models\Country;
use App\Models\Images;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function products_requests()
    {
        if (Auth::user()->role == 'Admin' ||Auth::user()->role == 'Manager') {
            $product = Products::get();
            return view('admin.products.products_requests', compact('product'));
        } else {
            return redirect('/administrator/products-1')->with('error', 'Role is invalid!');
        }
    }
    public function products_requests_user($id)
    {
        if (Auth::user()->role == 'Admin' ||Auth::user()->role == 'Manager') {
            $product = Products::where('user_id', $id)->get();
            return view('admin.products.products_requests', compact('product'));
        } else {
            return redirect('/administrator/products-1')->with('error', 'Role is invalid!');
        }
    }

    public function EditImage($id)
    {
        $image = Images::where('id', $id)->first();
        return view('admin.products.edit_images', compact('image', 'id'));
    }
    public function PostEditImage(Request $request)
    {
        $image = Images::where('id', $request->id)->first();

        if ($request->hasfile('Image')) {
            $imageName = env('APP_URL') . 'images/Brand/' . time() . '.' . $request->Image->extension();
            $image->Image = $imageName;
            $request->Image->move(public_path('images/Brand'),  $imageName);
        }
        $image->save();
        return redirect()->back();
    }
    public function DeleteImage($id)
    {
        Images::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Record Deleted Successfully!');
    }

    public function products_description()
    {
        $Products = Products::first();
        return view('admin.products.products_description', compact('Products'));
    }

    public function new_product()
    {
        $category = category::get();
        return view('admin.products.new_product', compact('category'));
    }
    public function products()
    {
        if (Auth::user()->role == 'Admin' ||Auth::user()->role == 'Manager') {
            $Products = Products::get();
            return view('admin.products.index', compact('Products'));
        }
        if (Auth::user()->role == 'Staff') {
            $Products = Products::where('user_id', Auth::user()->id)->orderby('id', 'DESC')->get();
            return view('admin.products.index', compact('Products'));
        }
    }
    public function edit_products($id)
    {
        $Products = Products::where('id', $id)->first();
        $category = category::where('id', $Products->Category)->first();
        $Brand = Brand::where('Brand_category', $category->category_name)->orderby('id', 'DESC')->get();
        $country = Country::get();
        return view('admin.products.edit', compact('Products', 'category', 'country', 'Brand', 'id'));
    }
    public function edit_Images($id)
    {
        $image = Images::where('product_id', $id)->orderby('id', 'DESC')->get();
        return view('admin.products.editImages', compact('image', 'id'));
    }

    public function new_products($category)
    {
        $category = category::where('category_name', $category)->first();
        $Brand = Brand::where('Brand_category', $category->category_name)->orderby('id', 'DESC')->get();
        $country = Country::get();
        return view('admin.products.new', compact('category', 'Brand', 'country'));
    }


    public function post_products(Request $request)
    {

        $request->validate(
            [
                'Description' => 'required',
            ],
            [
                'Description.required' => 'Long Description is required...',
            ]
        );
        $category = category::where('id', $request->Category)->first();

        $product = new Products();
        $product->user_id = Auth::user()->id;
        $product->user_name = Auth::user()->name;
        $product->user_email = Auth::user()->email;
        $product->Body_type = $request->Body_type;
        $product->Transmission_type = $request->Transmission_type;
        $product->Drive_type = $request->Drive_type;
        $product->Fuel_type = $request->Fuel_type;
        $product->Capacities = $request->Capacities;
        $product->Doors = $request->Doors;
        $product->Millage = $request->Millage;
        $product->Features = $request->Features;
        $product->Top_speed = $request->Top_speed;
        $product->Category = $request->Category;
        $product->Category_name = $category->category_name;
        $product->Brand = $request->Brand;
        $product->top_10 = $request->top_10;
        $product->Upcoming = $request->Upcoming;
        $product->Tags = $request->Tags;
        $product->Product_status = $request->Product_status;
        $product->Title = $request->Title;
        $product->Year = $request->Year;
        $product->Image_alt = $request->Image_alt;
        $product->Short_Description = $request->Short_Description;
        $product->Description = $request->Description;
        $product->Price = $request->Price;
        $product->Country = $request->Country;

        if ($request->hasfile('Thumbnail_Image')) {
            $imageName = env('APP_URL') . 'images/categories/' . time() . '.' . $request->Thumbnail_Image->extension();
            $product->Thumbnail_Image = $imageName;
            $request->Thumbnail_Image->move(public_path('images/categories'),  $imageName);
        }
        $product->save();
        if ($request->has('Multiple_images')) {
            $image = $request->file('Multiple_images');
            foreach ($image as $files) {
                $file_origninl_name =  $files->getClientOriginalName();
                $file_name = $file_origninl_name . time()  . "." . $files->getClientOriginalExtension();
                $files->move('images/products/', $file_name);
                $imagepath = url('/') . '/' . 'images/products' . '/' . $file_name;
                $Images = new Images();
                $Images->product_id = $product->id;
                $Images->Image = $imagepath;
                $Images->save();
            }
        }
        if ($product == true) {
            return redirect()->route('admin.products1')->with('success', 'Product saved successfully!');
        } else {
            return redirect()->route('admin.products1')->with('error', 'Something went wrong!');
        }
    }
    public function post_edit_products(Request $request)
    {

        $category = category::where('id', $request->Category)->first();
        $product = Products::where('id', $request->id)->first();
        $product->user_id = Auth::user()->id;
        $product->user_name = Auth::user()->name;
        $product->user_email = Auth::user()->email;
        $product->Body_type = $request->Body_type;
        $product->Transmission_type = $request->Transmission_type;
        $product->Drive_type = $request->Drive_type;
        $product->Fuel_type = $request->Fuel_type;
        $product->Capacities = $request->Capacities;
        $product->Doors = $request->Doors;
        $product->Category = $request->Category;
        $product->Category_name = $category->category_name;
        $product->Brand = $request->Brand;
        $product->top_10 = $request->top_10;
        $product->Upcoming = $request->Upcoming;
        $product->Tags = $request->Tags;
        $product->Product_status = $request->Product_status;
        $product->Title = $request->Title;
        $product->Year = $request->Year;
        $product->Image_alt = $request->Image_alt;
        $product->Short_Description = $request->Short_Description;
        $product->Description = $request->Description;
        $product->Price = $request->Price;
        $product->Country = $request->Country;
        $product->save();
        return redirect()->route('admin.products1')->with('success', 'products updated successfully!');
    }
    public function save_images(Request $request)
    {
        if ($request->has('Multiple_images')) {
            $image = $request->file('Multiple_images');
            foreach ($image as $files) {
                $file_origninl_name =  $files->getClientOriginalName();
                $file_name = $file_origninl_name . time()  . "." . $files->getClientOriginalExtension();
                $files->move('images/products/', $file_name);
                $imagepath = url('/') . '/' . 'images/products' . '/' . $file_name;
                $Images = new Images();
                $Images->product_id = $request->id;
                $Images->Image = $imagepath;
                $Images->save();
            }
        }
        return redirect()->back()->with('success', 'Images Saved Successfully!');
    }
    public function activeproducts($id)
    {
        $products = products::where('id', $id)->first();
        $products->status = 1;
        $products->save();
        return redirect()->back()->with('success', 'Status updated successfully!');
    }
    public function blockproducts($id)
    {
        $products = products::where('id', $id)->first();
        $products->status = 0;
        $products->save();
        return redirect()->back()->with('success', 'Status updated successfully!');
    }
    public function deleteproducts($id)
    {
        $products = products::where('id', $id)->first();
        $products->delete();
        return redirect()->back()->with('success', 'Record deleted successfully!');
    }
}
