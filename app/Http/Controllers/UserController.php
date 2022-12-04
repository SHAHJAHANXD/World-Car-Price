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
use App\Models\Country;
use App\Models\UserData;
use Illuminate\Support\Facades\Artisan;

use function Symfony\Component\VarDumper\Dumper\esc;

class UserController extends Controller
{
    public function updateprofile(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if ($request->name == true) {
            $user->name = $request->name;
        }
        if ($request->profile_image == true) {
            if ($request->hasfile('profile_image')) {
                $imageName = env('APP_URL') . 'images/users/' . time() . '.' . $request->profile_image->extension();
                $user->profile_image = $imageName;
                $request->profile_image->move(public_path('images/users'),  $imageName);
            }
        }
        if ($request->password == true) {
            $check = Hash::check($request->old_password, $request->password);
            if ($check == true) {
                $user->password = Hash::make($request->password);
            } else {
                return redirect()->back()->with('error', 'Old Password is Invalid');
            }
        }
        $user->save();
        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }
    public function clearcache()
    {
        Artisan::call('cache:clear');
        return redirect()->route('admin.dashboard')->with('success', 'Cache Cleared Successfully!');
    }
    public function country(Request $request)
    {
        $ip = $request->ip();
        if ($ip == true) {
            $country = Country::where('status', 1)->get();
            return view('front.index.country', compact('country', 'ip'));
        } else {
            $ip = "127.0.0.1";
            $country = Country::where('status', 1)->get();
            return view('front.index.country', compact('country', 'ip'));
        }
    }
    public function FalseCeiling()
    {
        if (Auth::user()->role == 'Admin') {
            $Products = FalseCeiling::get();
            $Productss = FalseCeiling::get();
            return view('admin.false.table', compact('Products', 'Productss'));
        } else {
            return redirect()->back()->with('error', 'Role is invalid!');
        }
    }
    public function FalseCeilingcategory($category)
    {
        if (Auth::user()->role == 'Admin') {
            $Products = FalseCeilingImages::where('category', $category)->get();

            return view('admin.false.images', compact('Products'));
        } else {
            return redirect()->back()->with('error', 'Role is invalid!');
        }
    }

    public function PostFalseCeiling(Request $request)
    {
        $id = FalseCeiling::where('title', $request->category)->first('id');

        if ($request->has('Image')) {
            $image = $request->file('Image');
            foreach ($image as $files) {
                $file_origninl_name =  $files->getClientOriginalName();
                $file_name = $file_origninl_name . time()  . "." . $files->getClientOriginalExtension();
                $files->move('images/products/', $file_name);
                $imagepath = '/' . 'images/products' . '/' . $file_name;
                $Images = new FalseCeilingImages();
                $Images->category = $id->id;
                $Images->Image = $imagepath;
                $Images->save();
            }
        }
        return redirect()->back()->with('success', 'False Ceiling Created Successfully!');
    }
    public function users()
    {
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager') {
            $user = User::where('id', '!=', auth()->id())->orderBy('id', 'desc')->get();
            return view('admin.users.table', compact('user'));
        } else {
            return redirect()->back()->with('error', 'Role is invalid!');
        }
    }
    public function edit_users($id)
    {
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager') {
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
    public function change_country(Request $request, $id)
    {
        $ip = $request->ip();
        if ($ip == true) {
            $UserData = UserData::where('ip', $ip)->first();
            $UserData->country_id = $id;
            $UserData->save();
            return redirect('/');
        } else {
            $UserData = UserData::where('ip', '127.0.0.1')->first();
            $UserData->country_id = $id;
            $UserData->save();
            return redirect('/');
        }
    }
    public function index(Request $request)
    {

        $ip =  $request->ip();
        $found = UserData::where('ip', $ip)->count();
        if ($found == 0) {
            $UserData = new UserData();
            $UserData->ip = $ip;
            $UserData->country_id = 227;
            $UserData->save();
        }
        $category_car = category::where('category_name', 'Car')->first();
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
        $search = $request['search'] ?? '';
        if ($search) {
            $Products = Products::where('status', 1)->where('title', 'like', '%' . $search . '%')->get();
        } else {
            $Products = Products::where('status', 1)->orderBy('id', 'desc')->take(20)->get();
        }
        if ($ip == true) {
            return view('front.index.index', compact('Products', 'ip', 'search'));
        } else {
            $ip = "12.12.12";
            return view('front.index.index', compact('Products', 'ip', 'search'));
        }
    }
    public function wallpapers(Request $request)
    {
        $ip = $request->ip();
        $FalseCeiling = FalseCeiling::get();
        if ($ip == true) {
            return view('front.index.FalseCeiling', compact('FalseCeiling', 'ip'));
        } else {
            $ip = "127.0.0.1";
            return view('front.index.FalseCeiling', compact('FalseCeiling', 'ip'));
        }
    }
    public function wallpapers_detail(Request $request, $id)
    {

        $ip = $request->ip();
        $FalseCeiling = FalseCeilingImages::where('category', $id)->paginate(12);
        if ($ip == true) {
            return view('front.index.wallpapers_detail', compact('FalseCeiling', 'ip', 'id'));
        } else {
            $ip = "127.0.0.1";
            return view('front.index.wallpapers_detail', compact('FalseCeiling', 'ip', 'id'));
        }
    }
    public function productcategory(Request $request, $category)
    {
        $ip = $request->ip();
        $category = Products::where('category', $category)->get();
        if ($ip == true) {
            return view('front.index.details_category', compact('category', 'ip'));
        } else {
            $ip = "127.0.0.1";
            return view('front.index.details_category', compact('category', 'ip'));
        }
    }
    public function product_detail_by_body(Request $request, $type)
    {
        $ip = $request->ip();
        $category = Products::where('Body_type', $type)->where('status', 1)->get();
        $category = category::where('id', 1)->orWhere('id', 2)->first();
        $brand = Brand::where('Brand_category', $category->category_name)->get();
        $cars = Products::where('Body_type', $type)->where('status', 1)->orderBy('id', 'desc')->get();
        $carss = Products::where('Body_type', $type)->where('status', 1)->orderBy('id', 'desc')->first();
        if ($ip == true) {
            return view('front.index.details_category', compact('cars', 'carss', 'category', 'brand', 'ip'));
        } else {
            $ip = "127.0.0.1";
            return view('front.index.details_category', compact('cars', 'carss', 'category', 'brand', 'ip'));
        }
    }
    public function product_detail_by_transmission(Request $request, $type)
    {
        $ip = $request->ip();
        $category = Products::where('Transmission_type', $type)->where('status', 1)->get();
        $category = category::where('id', 1)->orWhere('id', 2)->first();
        $brand = Brand::where('Brand_category', $category->category_name)->get();
        $cars = Products::where('Transmission_type', $type)->where('status', 1)->orderBy('id', 'desc')->get();
        $carss = Products::where('Transmission_type', $type)->where('status', 1)->orderBy('id', 'desc')->first();

        if ($ip == true) {
            return view('front.index.details_category', compact('cars', 'carss', 'category', 'brand', 'ip'));
        } else {
            $ip = "127.0.0.1";
            return view('front.index.details_category', compact('cars', 'carss', 'category', 'brand', 'ip'));
        }
    }
    public function product_detail_by_drive(Request $request, $type)
    {
        $ip = $request->ip();
        $category = Products::where('Drive_type', $type)->where('status', 1)->get();
        $category = category::where('id', 1)->orWhere('id', 2)->first();
        $brand = Brand::where('Brand_category', $category->category_name)->get();
        $cars = Products::where('Drive_type', $type)->where('status', 1)->orderBy('id', 'desc')->get();
        $carss = Products::where('Drive_type', $type)->where('status', 1)->orderBy('id', 'desc')->first();
        if ($ip == true) {
            return view('front.index.details_category', compact('cars', 'carss', 'category', 'brand', 'ip'));
        } else {
            $ip = "127.0.0.1";
            return view('front.index.details_category', compact('cars', 'carss', 'category', 'brand', 'ip'));
        }
    }
    public function product_detail_by_fuel(Request $request, $type)
    {
        $ip = $request->ip();
        $category = Products::where('Fuel_type', $type)->where('status', 1)->get();
        $category = category::where('id', 1)->orWhere('id', 2)->first();
        $brand = Brand::where('Brand_category', $category->category_name)->get();
        $cars = Products::where('Fuel_type', $type)->where('status', 1)->orderBy('id', 'desc')->get();
        $carss = Products::where('Fuel_type', $type)->where('status', 1)->orderBy('id', 'desc')->first();
        if ($ip == true) {
            return view('front.index.details_category', compact('cars', 'carss', 'category', 'brand', 'ip'));
        } else {
            $ip = "127.0.0.1";
            return view('front.index.details_category', compact('cars', 'carss', 'category', 'brand', 'ip'));
        }
    }
    public function product_detail_by_capacities(Request $request, $type)
    {
        $ip = $request->ip();
        $category = Products::where('Capacities', $type)->where('status', 1)->get();
        $category = category::where('id', 1)->orWhere('id', 2)->first();
        $brand = Brand::where('Brand_category', $category->category_name)->get();
        $cars = Products::where('Capacities', $type)->where('status', 1)->orderBy('id', 'desc')->get();
        $carss = Products::where('Capacities', $type)->where('status', 1)->orderBy('id', 'desc')->first();
        if ($ip == true) {
            return view('front.index.details_category', compact('cars', 'carss', 'category', 'brand', 'ip'));
        } else {
            $ip = "127.0.0.1";
            return view('front.index.details_category', compact('cars', 'carss', 'category', 'brand', 'ip'));
        }
    }
    public function product_detail_by_doors(Request $request, $type)
    {
        $ip = $request->ip();
        $category = Products::where('Doors', $type)->where('status', 1)->get();
        $category = category::where('id', 1)->orWhere('id', 2)->first();
        $brand = Brand::where('Brand_category', $category->category_name)->get();
        $cars = Products::where('Doors', $type)->where('status', 1)->orderBy('id', 'desc')->get();
        $carss = Products::where('Doors', $type)->where('status', 1)->orderBy('id', 'desc')->first();
        if ($ip == true) {
            return view('front.index.details_category', compact('cars', 'carss', 'category', 'brand', 'ip'));
        } else {
            $ip = "127.0.0.1";
            return view('front.index.details_category', compact('cars', 'carss', 'category', 'brand', 'ip'));
        }
    }
    public function product_detail(Request $request, $id)
    {
        $found = Products::where('id', $id)->count();
        if ($found == 0) {
            return redirect()->back();
        } else {
            $ip = $request->ip();
            $Products = Products::where('id', $id)->first();
            if ($ip == true) {
                return view('front.index.details', compact('Products', 'ip'));
            } else {
                $ip = "127.0.0.1";
                return view('front.index.details', compact('Products', 'ip'));
            }
        }
    }


    public function product_detail_by_category(Request $request, $id)
    {
        $ip = $request->ip();
        $category = category::where('id', $id)->first();
        $brand = Brand::where('Brand_category', $category->category_name)->get();
        $cars = Products::where('category', $id)->where('status', 1)->orderBy('id', 'desc')->paginate(20);
        $carss = Products::where('category', $id)->where('status', 1)->orderBy('id', 'desc')->first();
        if ($request->ajax()) {
    		$view = view('front.index.details_category', compact('cars', 'carss', 'category', 'brand', 'ip' , 'id'))->render();
            return response()->json(['html'=>$view]);
        }
        if ($ip == true) {
            return view('front.index.details_category', compact('cars', 'carss', 'category', 'brand', 'ip' , 'id'));
        } else {
            $ip = "127.0.0.1";
            return view('front.index.details_category', compact('cars', 'carss', 'category', 'brand', 'ip', 'id'));
        }
    }
    public function product_detail_by_brand(Request $request, $brands)
    {
        $found = Products::where('Brand', $brands)->count();
        if ($found == 0) {
            return redirect()->back()->with('error', 'Products with this brands are not available!');
        } else {
            $ip = $request->ip();
            $carss = Products::where('Brand', $brands)->first();
            $category = category::where('id', $carss->Category)->first();
            $brand = Brand::where('Brand_category', $category->category_name)->get();
            $cars = Products::where('Brand', $brands)->where('status', 1)->orderBy('id', 'desc')->get();

            if ($ip == true) {
                return view('front.index.details_brand', compact('cars', 'carss', 'category', 'brand', 'ip'));
            } else {
                $ip = "127.0.0.1";
                return view('front.index.details_brand', compact('cars', 'carss', 'category', 'brand', 'ip'));
            }
        }
    }
    public function product_detail_by_top_10(Request $request, $id, $category)
    {
        $ip = $request->ip();
        $category = category::where('category_name', $category)->first();
        $brand = Brand::where('Brand_category', $category)->get();
        $cars = Products::where('top_10', 'Yes')->where('Category', $id)->where('status', 1)->orderBy('id', 'desc')->get();
        $carss = Products::where('top_10', 'Yes')->where('Category', $id)->where('status', 1)->orderBy('id', 'desc')->first();
        if ($ip == true) {
            return view('front.index.details_brand', compact('cars', 'carss', 'brand', 'ip', 'category'));
        } else {
            $ip = "127.0.0.1";
            return view('front.index.details_brand', compact('cars', 'carss', 'brand', 'ip', 'category'));
        }
    }
    public function product_detail_by_upcoming(Request $request, $id, $category)
    {
        $ip = $request->ip();
        $category = category::where('category_name', $category)->first();
        $brand = Brand::where('Brand_category', $category)->get();
        $carss = Products::where('Upcoming', 'Yes')->where('Category', $id)->where('status', 1)->orderBy('id', 'desc')->get();
        $cars = Products::where('Upcoming', 'Yes')->where('Category', $id)->where('status', 1)->orderBy('id', 'desc')->get();
        if ($ip == true) {
            return view('front.index.details_brand', compact('cars', 'carss', 'brand', 'ip', 'category'));
        } else {
            $ip = "127.0.0.1";
            return view('front.index.details_brand', compact('cars', 'carss', 'brand', 'ip', 'category'));
        }
    }
    public function DeleteFalseCeiling($id)
    {
        $category = FalseCeiling::where('id', $id)->first();
        $category->delete();
        return redirect()->back()->with('success', 'Record deleted successfully!');
    }
}
