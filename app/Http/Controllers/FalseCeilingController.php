<?php

namespace App\Http\Controllers;

use App\Models\FalseCeiling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FalseCeilingController extends Controller
{
    public function false_ceiling()
    {
        if (Auth::user()->role == 'Admin') {
            $FalseCeiling = FalseCeiling::get();
            return view('admin.false_ceiling.index', compact('FalseCeiling'));
        } else {
            return redirect()->back()->with('error', 'Role is invalid!');
        }

    }
    public function edit_false_ceiling($id)
    {
        $FalseCeiling = FalseCeiling::where('id', $id)->first();
        return view('admin.false_ceiling.edit', compact('FalseCeiling','id'));
    }


    public function post_false_ceiling(Request $request)
    {
        $FalseCeiling = new FalseCeiling();
        $FalseCeiling->title = $request->title;
        $FalseCeiling->save();
        return redirect()->back()->with('success','Record created successfully!');
    }
    public function post_edit_false_ceiling(Request $request)
    {
        $FalseCeiling = FalseCeiling::where('id', $request->id)->first();
        $FalseCeiling->title = $request->title;
        $FalseCeiling->save();
        return redirect()->route('admin.false_ceiling')->with('success','Record updated successfully!');
    }

    public function activeFalseCeiling($id)
    {
        $FalseCeiling = FalseCeiling::where('id' , $id)->first();
        $FalseCeiling->FalseCeiling_status = 1;
        $FalseCeiling->save();
        return redirect()->back()->with('success','Status updated successfully!');
    }
    public function blockFalseCeiling($id)
    {
        $FalseCeiling = FalseCeiling::where('id' , $id)->first();
        $FalseCeiling->FalseCeiling_status = 0;
        $FalseCeiling->save();
        return redirect()->back()->with('success','Status updated successfully!');
    }
    public function deletefalse_ceiling($id)
    {
        $FalseCeiling = FalseCeiling::where('id' , $id)->first();
        $FalseCeiling->delete();
        return redirect()->back()->with('success','Record deleted successfully!');
    }
}
