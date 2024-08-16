<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\categories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function list(){
        return view('admin.pages.product.list');
    }
    public function createForm(){
        $brands = Brand::all();
        $categories = categories::all();
        return view('admin.pages.product.form',compact('brands','categories'));
    }
}
