<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $clientIP = request()->ip();
        dd($clientIP);
        return view("home");
    }

}
