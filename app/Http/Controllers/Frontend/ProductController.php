<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\categories;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function singleProductView($productId){
        $singleProduct = Product::find($productId);
        return view('frontend.pages.product-view',compact('singleProduct'));
    }
    public function delete($id){
        $product = Product::find($id);
        if($product){
            $product->delete();
        }
        notify()->success('Product Deleted Succefully');
        return redirect()->back();
    }
    public function edit($id){
        $product = Product::find($id);
        $brands= Brand::all();
        $categories = categories::all();
        return view('admin.pages.product.edit',compact('brands','categories','product'));
    }
    public function update(Request $request,$id){
        $product = Product::find($id);
        if($product){
            $fileName = $product->image;
            if($request->file('image')){
                $file=$request->file('image');
              $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
              $file->storeAs('uploads',$fileName);
            }
            $product->update([
                'brand_id'=>$request->brand_id,
                'category_id'=>$request->category_id,
                'name'=>$request->product_name,
                'price'=>$request->product_price,
                'description'=>$request->product_description,
                'stock'=>$request->product_stock,
                'image'=>$fileName
            ]);
            notify()->success('Product updated successfully.');
            return redirect()->back();
        }
    }
}
