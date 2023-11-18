<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {

        return view("admin/index");
    }

    public function tab($tab)
    {
        return view("admin.tab", [
            "tab" => $tab
        ]);
    }

    public function image(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "upload" => ["required", "image", "max:16125", "min:5"]
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->add("error", true);
            return response($error);
        } else {
            $name = "cache/upload_" . Auth::id() . ".jpg";
            $request->upload->storeAs('images', $name, 'local');
            $file = "photo/" . $name;
            $image = Image::make($file);
            $image->save();

            return response(
                [
                    "url" => $name . "?ver=" . date("y.m.dhis"),
                    "error" => false,
                ]
            );
        }
    }
}
