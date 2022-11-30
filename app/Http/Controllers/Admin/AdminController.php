<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Traffic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->role == 'Admin' ||Auth::user()->role == 'Manager') {
            $products = Products::count();
            $users = User::take(10)->orderBy('id', 'DESC')->where('id', '!=', auth()->id())->get();
            $traffic = Traffic::first();
            return view('admin.dashboard.index', compact('users', 'traffic', 'products'));
        } else {
            return redirect('/administrator/products-1');
        }
    }
    public function login()
    {

        return view('admin.auth.login');
    }
    public function allUsers()
    {
        $users = User::where('role', 'User')->orderby('id', 'DESC')->get();
        return view('admin.users.table', compact('users'));
    }
    public function authenticate(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required|min:8|max:254',
            ],
            [
                'email.required' => 'Email is required...',

                'password.required' => 'Password is required...',
                'password.min' => 'Password must be atleast 8 characters...',
                'password.max' => 'Password must be less then 254 characters...',
            ]
        );

        $found = User::where('email', $request->email)->count();
        if ($found == 0) {
            return redirect()->back()->with('error', 'Email or password is invalid!');
        }
        $data = User::where('email', $request->email)->first();
        if ($data->status == 0) {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Your account is terminated!');
        }
        if ($data->role == 'Admin') {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->with('error', 'Email or password is invalid!');
            }
        } elseif ($data->role == 'Staff') {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->with('error', 'Email or password is invalid!');
            }
        }
        elseif ($data->role == 'Manager') {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->with('error', 'Email or password is invalid!');
            }
        } else {
            return redirect()->back()->with('error', 'Admin role is invalid!');
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('admin.login');
    }
}
