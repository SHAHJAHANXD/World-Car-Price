<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function Brand()
    {
        if (Auth::user()->role == 'Admin') {
            $Brand = Brand::get();
            $category = category::get();
            return view('admin.Brand.index', compact('Brand', 'category'));
        } else {
            return redirect()->back()->with('error', 'Role is invalid!');
        }
    }
    public function edit_brands($id)
    {
        $Brand = Brand::where('id', $id)->first();
        return view('admin.Brand.edit', compact('Brand', 'id'));
    }


    public function post_brands(Request $request)
    {

        $request->validate(
            [
                'Brand_name' => 'required',
                'Brand_category' => 'required',
            ],
            [
                'Brand_name.required' => 'Brand name is required...',
                'Brand_category.required' => 'Brand category is required...',

            ]
        );
        $Brand = new Brand();
        $Brand->Brand_name = $request->Brand_name;
        $Brand->Brand_category = $request->Brand_category;
        $Brand->save();
        return redirect()->back()->with('success', 'Brand created successfully!');
    }
    public function post_edit_brands(Request $request)
    {
        $Brand = Brand::where('id', $request->id)->first();
        $Brand->Brand_name = $request->Brand_name;
        if ($request->hasfile('Brand_image')) {
            $imageName = env('APP_URL') . 'images/Brand/' . time() . '.' . $request->Brand_image->extension();
            $Brand->Brand_image = $imageName;
            $request->Brand_image->move(public_path('images/Brand'),  $imageName);
        }
        $Brand->save();
        return redirect()->route('admin.Brands')->with('success', 'Brand updated successfully!');
    }

    public function activeBrand($id)
    {
        $Brand = Brand::where('id', $id)->first();
        $Brand->Brand_status = 1;
        $Brand->save();
        return redirect()->back()->with('success', 'Status updated successfully!');
    }
    public function blockBrand($id)
    {
        $Brand = Brand::where('id', $id)->first();
        $Brand->Brand_status = 0;
        $Brand->save();
        return redirect()->back()->with('success', 'Status updated successfully!');
    }
    public function deletebrands($id)
    {
        $Brand = Brand::where('id', $id)->first();
        $Brand->delete();
        return redirect()->back()->with('success', 'Record deleted successfully!');
    }
}
