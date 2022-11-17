<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\category;
use App\Models\FalseCeiling;
use App\Models\FalseCeilingImages;
use App\Models\Products;
use App\Models\Traffic;
use App\Models\User;
use App\Models\vehicle_products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use AmrShawky\LaravelCurrency\Facade\Currency;

class UserController extends Controller
{
    public function FalseCeiling()
    {
        if (Auth::user()->role == 'Admin') {
            $Products = FalseCeiling::get();
            return view('admin.false.table', compact('Products'));
        } else {
            return redirect()->back()->with('error', 'Role is invalid!');
        }
    }
    public function PostFalseCeiling(Request $request)
    {
        $false = new FalseCeiling();
        $false->title = $request->title;
        $false->save();
        if ($request->has('Image')) {
            $image = $request->file('Image');
            foreach ($image as $files) {
                $file_origninl_name =  $files->getClientOriginalName();
                $file_name = $file_origninl_name . time()  . "." . $files->getClientOriginalExtension();
                $files->move('images/products/', $file_name);
                $imagepath = '/' . 'images/products' . '/' . $file_name;
                $Images = new FalseCeilingImages();
                $Images->false_id = $false->id;
                $Images->Image = $imagepath;
                $Images->save();
            }
        }
        return redirect()->back()->with('success', 'False Ceiling Created Successfully!');
    }
    public function users()
    {
        if (Auth::user()->role == 'Admin') {
            $user = User::get();
            return view('admin.users.table', compact('user'));
        } else {
            return redirect()->back()->with('error', 'Role is invalid!');
        }
    }
    public function edit_users($id)
    {
        if (Auth::user()->role == 'Admin') {
            $user = User::where('id', $id)->first();
            return view('admin.users.edit', compact('user', 'id'));
        } else {
            return redirect()->back()->with('error', 'Role is invalid!');
        }
    }
    public function save_user(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('success', 'Account Created Successfully!');
    }
    public function save_edit_users(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if ($request->name == true) {
            $user->name = $request->name;
        }
        if ($request->email == true) {
            $user->email = $request->email;
        }
        if ($request->role == true) {
            $user->role = $request->role;
        }
        if ($request->password == true) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('admin.users')->with('success', 'Account Updated Successfully!');
    }

    public function activeuser($id)
    {
        $User = User::where('id', $id)->first();
        $User->status = 1;
        $User->save();
        return redirect()->back()->with('success', 'Status updated successfully!');
    }
    public function blockuser($id)
    {
        $User = User::where('id', $id)->first();
        $User->status = 0;
        $User->save();
        return redirect()->back()->with('success', 'Status updated successfully!');
    }
    public function index()
    {

        // $Products = Products::first('Price');
        // $currency = \Currency::convert()->from('USD')->to('PKR')->amount(150)->get();
        // $str = $currency ;
        // $str_arr = explode('.', $str);
        // dd($str_arr[0]);

        $category_car = category::where('category_name', 'Car')->first();
        $cars = Products::where('Category', $category_car->id)->where('status', 1)->orderBy('id', 'desc')->take(3)->get();

        $category_e_cars = category::where('category_name', 'E Car')->first();
        $e_cars = Products::where('Category', $category_e_cars->id)->where('status', 1)->orderBy('id', 'desc')->take(3)->get();

        $category_bikes = category::where('category_name', 'Bikes')->first();
        $bikes = Products::where('Category', $category_bikes->id)->where('status', 1)->orderBy('id', 'desc')->take(3)->get();

        $category_e_bikes = category::where('category_name', 'E Bikes')->first();
        $e_bikes = Products::where('Category', $category_e_bikes->id)->where('status', 1)->orderBy('id', 'desc')->take(3)->get();

        $category_bicycle = category::where('category_name', 'BiCycles')->first();
        $bicycle = Products::where('Category', $category_bicycle->id)->where('status', 1)->orderBy('id', 'desc')->take(3)->get();

        // $category_e_bicycle = category::where('category_name', 'E BiCycles')->first();
        // $e_bicycle = Products::where('Category', $category_e_bicycle->id)->where('status', 1)->orderBy('id', 'desc')->take(3)->get();

        $Traffic = Traffic::where('id', 1)->count();
        if ($Traffic == 0) {
            $user = new Traffic();
            $user->total_views = 1;
            $user->save();
        } else {
            $user = Traffic::find(1);
            $user->total_views = $user->total_views + 1;
            $user->save();
        }
        return view('front.index.index', compact('cars', 'bikes', 'e_cars', 'e_bikes', 'bicycle'));
    }
    public function wallpapers()
    {
        $FalseCeiling = FalseCeiling::get();
        return view('front.index.FalseCeiling', compact('FalseCeiling'));
    }

    public function productcategory($category)
    {
        $category = vehicle_products::where('category', $category)->get();
        return view('front.category.index', compact('category'));
    }
    public function product_detail($id)
    {
        $found = Products::where('id', $id)->count();
        if ($found == 0) {
            return redirect()->back();
        } else {
            $Products = Products::where('id', $id)->first();
            return view('front.index.details', compact('Products'));
        }
    }
    public function wallpapers_detail($id)
    {
        $FalseCeiling = FalseCeiling::where('id', $id)->first();
        return view('front.index.wallpapers_detail', compact('FalseCeiling'));
    }

    public function product_detail_by_category($id)
    {
        $category = category::where('id', $id)->first();
        $brand = Brand::where('Brand_category', $category->category_name)->get();
        $cars = Products::where('category', $id)->where('status', 1)->take(12)->orderBy('id', 'desc')->get();
        $carss = Products::where('category', $id)->where('status', 1)->take(12)->orderBy('id', 'desc')->first();
        return view('front.index.details_category', compact('cars','carss', 'brand'));
    }
    public function product_detail_by_brand($brands)
    {
        $found = Products::where('Brand', $brands)->count();
        if ($found == 0) {
            return redirect()->back()->with('error', 'Products with this brands are not available!');
        } else {
            $carss = Products::where('Brand', $brands)->first();
            $category = category::where('id', $carss->Category)->first();
            $brand = Brand::where('Brand_category', $category->category_name)->get();
            $cars = Products::where('Brand', $brands)->where('status', 1)->take(12)->orderBy('id', 'desc')->get();
            return view('front.index.details_brand', compact('cars', 'brand'));
        }
    }
    public function product_detail_by_top_10($category)
    {
        $brand = Brand::where('Brand_category', $category)->get();
        $cars = Products::where('top_10', 'Yes')->where('Category_name', $category)->where('status', 1)->take(12)->orderBy('id', 'desc')->get();
        $carss = Products::where('top_10', 'Yes')->where('Category_name', $category)->where('status', 1)->take(12)->orderBy('id', 'desc')->first();
        return view('front.index.details_brand', compact('cars','carss', 'brand'));
    }
    public function product_detail_by_upcoming($category)
    {
        $brand = Brand::where('Brand_category', $category)->get();
        $cars = Products::where('Upcoming', 'Yes')->where('Category_name', $category)->where('status', 1)->take(12)->orderBy('id', 'desc')->get();
        return view('front.index.details_brand', compact('cars', 'brand'));
    }
    public function DeleteFalseCeiling($id)
    {
        $category = FalseCeiling::where('id', $id)->first();
        $category->delete();
        return redirect()->back()->with('success', 'Record deleted successfully!');
    }
}
