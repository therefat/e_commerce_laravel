<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function list (){
        return view('admin.pages.category.list');
    }
    public function createForm(){
        return view('admin.pages.category.form');
    }
    public function store(Request $request){
        categories::create([
            'name'=>$request->category_name,
                'description'=>$request->category_description
        ]);
        return redirect()->back();
    }
}
