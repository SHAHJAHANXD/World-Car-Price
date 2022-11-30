<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountryController extends Controller
{
    public function countries()
    {
        if (Auth::user()->role == 'Admin' ||Auth::user()->role == 'Manager') {
            $Country = Country::get();
            return view('admin.countries.index', compact('Country'));
        } else {
            return redirect()->back()->with('error', 'Role is invalid!');
        }
    }
    public function edit_countries($id)
    {
        $Country = Country::where('id', $id)->first();
        return view('admin.countries.edit', compact('Country', 'id'));
    }
    public function post_edit_countries(Request $request)
    {
        $Country = Country::where('id', $request->id)->first();
        $Country->name = $request->name;
        $Country->rate = $request->rate;
        $Country->symbol = $request->symbol;
        $Country->status = 1;
        $Country->save();
        return redirect()->route('admin.countries')->with('success', 'Record updated successfully!');
    }
}
