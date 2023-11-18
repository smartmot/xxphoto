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
        $login["password"] = md5($login["password"]);
        if (Auth::attempt($login)) {
            // Authentication passed...
            return redirect(route("home"));
        }else{
            return $pass->after(function ($pass){
                $pass->errors()->add("password","Incorrect Password!");
            })->validate();
        }
    }

    public function reset(){
        return view("password/reset/index");
    }
    public function request(){
        return redirect(route("password.confirm"));
    }

    public function confirm(){
        return view("password/reset/confirm");
    }

    public function save(){
        return redirect(route("login"));
    }

}
