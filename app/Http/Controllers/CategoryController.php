<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //
    public function list (){
        $categories = categories::all();
        
        return view('admin.pages.category.list',compact('categories'));
    }
    public function createForm(){
        return view('admin.pages.category.form');
    }
    public function store(Request $request){
        $validate=Validator::make($request->all(),
        [
            'category_name'=>'required',
            'category_description'=>'required',
        ]);

        if($validate->fails())
        {
            // dd($validate->getMessageBag());
            return redirect()->back();
        }
        categories::create([
            'name'=>$request->category_name,
                'description'=>$request->category_description
        ]);
        return redirect()->back();
    }
}
