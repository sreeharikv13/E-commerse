<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Auth;

class LoginController
{
    public function login(){
        return view('admin.login');
    }

    public function doLogin(){
       $input = request()->only(['username','password']);
       
       
       if(auth()->guard('admin')->attempt($input)){
           return"Login Success";
       }else{
           return"Login Error";
       }
 
    }
}
