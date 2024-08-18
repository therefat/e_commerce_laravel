<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    public function list(){
        $users = User::all();
        return view('admin.pages.users.list',compact('users'));
    }
    public function createForm()
    {
        return view('admin.pages.users.create');
    }
    public function logout(){
        // auth()->logout;
        Auth::logout();
        return redirect()->route('login')->with('msg','Logout Success');

    }
    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'user_name'=> "required",
            'role'=>'required',
            'user_email'=>'required|email',
            'user_password'=> 'required|min:6',
        ]);
        if($validate->fails()){
            return redirect()->with('myError',$validate->getMessageBag());

        }
        $fileName = null;
        if($request->hasFile('user_image')){
            $file=$request->file('user_image');
            $file=$request->file('user_image');
            $fileName= date('Ymdhis').'.'.$file->getClientOriginalExtension();
            
            $file->storeAs('/uploads',$fileName);
        }
        // dd($request->role);
        User::create([
            'name'=>$request->user_name,
            'role'=>$request->role,
            'image'=>$fileName,
            'email'=>$request->user_email,
            'password'=>bcrypt($request->user_password),
        ]);
        return redirect()->back()->with('message','User Created succesfully.');
    }
}
