<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // 
    public function home(){
        $customers = User::where('role','customer');
        return view('admin.pages.home',compact('customers'));
    } 
    public function aboutUs()
    {
       return view('admin.about-us');
    }
}
