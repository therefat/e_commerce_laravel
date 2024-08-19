<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function buyNow($productId){
        Order::create([
            'user_id'=> auth()->user()->id,
            'product_id'=> $productId,
        ]);

       notify()->success('Order placed');
       return redirect()->back();
    }
    public function cancleOrder($order_id){
        $order= Order::find($order_id);
        if($order){
            $order->update([
                'status'=> 'cabcekked'
            ]);
            
        }
        notify()->success('Order Cancelled');
            return redirect()->back();
    }
}
