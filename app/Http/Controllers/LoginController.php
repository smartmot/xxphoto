<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        return view("login");
    }
    public function logout(){
        Auth::logout();
        return redirect(route("home"));
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            "email" => ["required","email","exists:users,email"],
            "password" => ["required"]
        ]);
        $login= $validator->validate();
        $login["status"] = "active";
        $pass = Validator::make($request->only("password"),[
            "password" => ["required"]
        ]);
        if (Auth::attempt($login)) {
            // Authentication passed...
            return redirect(route("admin.index"));
        }else{
            return $pass->after(function ($pass){
                $pass->errors()->add("password","Incorrect Password!");
            })->validate();
        }
    }
}
