<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function list(){
        $brands = Brand::all();
        return view('admin.pages.brand.list',compact('brands'));
    }
    public function createForm(){
        return view('admin.pages.brand.form');
    }
    public function store(Request $request) {
        Brand::create([
            'name'=>$request->brand_name,
            'description'=>$request->description,
        ]);
        return redirect()->back();
    }
}
