<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // 
    public function home(){
        $role = Role::where('name','customer')->first();
        if($role){
            $customers = User::where('role_id',$role->id)->count();
        } else{
            $customers= 0;
        }
        
        return view('admin.pages.home',compact('customers'));
    } 
    public function aboutUs()
    {
       return view('admin.about-us');
    }
}
