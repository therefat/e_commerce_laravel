<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home(){
        $products=Product::all();
        // dd($products);
        return view('frontend.pages.home',compact('products'));
    }
    public function search(Request $request){
        if($request->search){
            $products = Product::where('name','LIKE','$'.$request->search.'%')->get();

        }
        else{
            $products = Product::all();
        }
        return view('frontend.pages.search',compact('products'));
    }

    public function productsUnderCategory($category_id){
        $productsUnderCategory = Product::where('category_id',$category_id)->get();
        return view('frontend.pages.products-under-category',compact('productsUnderCategory'));
    }
}
