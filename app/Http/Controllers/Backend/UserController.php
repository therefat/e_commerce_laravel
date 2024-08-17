<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function loginForm(){
        return view('admin.pages.login');
    }
    public function loginPost(Request $request){
        $val = Validator::make($request->all(),
        [
            'email'=>'required|emaill',
            'passwird'=>'required|min:6'
        ]
        );
        // if($val->fails()){
        //     return redirect()->back()->withErrors($val);
        // }
        $credentials = $request->except('_token');
        $login= auth()->attempt($credentials);
        if($login){
            return redirect()->route('dashboard');
        }
        return redirect()->back()->withErrors('invalid user email or password');
    }
    public function logout(){
        // auth()->logout;
        Auth::logout();
        return redirect()->route('login')->with('msg','Logout Success');

    }
}
