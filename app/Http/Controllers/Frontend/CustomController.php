<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomController extends Controller
{
    //
    public function registration(){
        return view('frontend.pages.registration');
    }
    public function profile(){
        $orders = Order::where('user_id',auth()->user()->id)->get();
        return view('frontend.pages.profile',compact('orders'));
    }
    public function store(Request $request){
        Customer::create([
            'name'=>$request->name,
            'email'=>$request->email,
            
            'password'=>bcrypt($request->password),
        ]);
        notify()->success('Customer Registration successful');
        return redirect()->back();
    }
    public function login(){
        return view('frontend.pages.login');
    }
    public function doLogin(Request $request){
        $val= Validator::make($request->all(),[
            'email'=> 'required',
            'password'=> "required",
        ]);
        if($val->fails()){
            notify()->error($val->getMessageBag());
            return redirect()->back();
        }
        $credentials= $request->except('_token');
        if(auth('customerGuard')->attempt($credentials)){
            notify()->success('Login Sucess');
            return redirect()->route('dashboard');
        }
        notify()->error('Invalid Credentails');
        return redirect()->back();
    }
    public function logout(){
        Auth::logout();
        notify()->success('Logout succes');
        return redirect()->route('home');


    }
}
