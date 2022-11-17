<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Images;
use App\Models\vehicle_products;
use Illuminate\Http\Request;

class VehicleProductsController extends Controller
{
    public function vehicle_products()
    {
        $product = vehicle_products::get();
        return view('admin.vehicle_products.index', compact('product'));
    }
    public function edit_vehicle_products($id)
    {
        $vehicle_products = vehicle_products::where('id', $id)->first();
        return view('admin.vehicle_products.edit', compact('vehicle_products', 'id'));
    }
    public function new_vehicle_products()
    {
        $category = category::get();
        return view('admin.vehicle_products.new', compact('category'));
    }


    public function post_vehicle_products(Request $request)
    {
        
        $product = vehicle_products::create($request->all());
        if ($request->has('file_images')) {
            $image = $request->file('file_images');
            foreach ($image as $files) {
                $file_origninl_name =  $files->getClientOriginalName();
                $file_name = $file_origninl_name . time()  . "." . $files->getClientOriginalExtension();
                $files->move('images/products/', $file_name);
                $imagepath = url('/') . '/' . 'images/products' .'/'. $file_name;
                $Images = new Images();
                $Images->product_id = $product->id;
                $Images->Image = $imagepath;
                $Images->save();
            }
        }
        if ($product == true) {
            return redirect()->back()->with('success', 'Product saved successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function post_edit_vehicle_products(Request $request)
    {
        $vehicle_products = vehicle_products::where('id', $request->id)->first();
        $vehicle_products->vehicle_products_name = $request->vehicle_products_name;
        if ($request->hasfile('vehicle_products_image')) {
            $imageName = env('APP_URL') . 'images/vehicle_products/' . time() . '.' . $request->vehicle_products_image->extension();
            $vehicle_products->vehicle_products_image = $imageName;
            $request->vehicle_products_image->move(public_path('images/vehicle_products'),  $imageName);
        }
        $vehicle_products->save();
        return redirect()->route('admin.vehicle_products')->with('success', 'vehicle_products updated successfully!');
    }

    public function activevehicle_products($id)
    {
        $vehicle_products = vehicle_products::where('id', $id)->first();
        $vehicle_products->vehicle_products_status = 1;
        $vehicle_products->save();
        return redirect()->back()->with('success', 'Status updated successfully!');
    }
    public function blockvehicle_products($id)
    {
        $vehicle_products = vehicle_products::where('id', $id)->first();
        $vehicle_products->vehicle_products_status = 0;
        $vehicle_products->save();
        return redirect()->back()->with('success', 'Status updated successfully!');
    }
    public function deletevehicle_products($id)
    {
        $vehicle_products = vehicle_products::where('id', $id)->first();
        $vehicle_products->delete();
        return redirect()->back()->with('success', 'Record deleted successfully!');
    }
}
