<?php

// app/Http/Controllers/ChildController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;

class ChildController extends Controller
{
    public function index()
    {
        $children = Child::all();
        return view('children.index', compact('children'));
    }

    public function update(Request $request)
    {
        $child = Child::findOrFail($request->input('id'));
        $child->update($request->all());
        return redirect()->route('children.list')->with('success', 'Child updated successfully!');
    }
}


