<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Cntl;
use App\Http\Middleware as Mdw;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Cntl\HomeController::class,"home"])->name("home");
Route::get('/admin', [Cntl\HomeController::class,"home"])->name("admin")->middleware("auth");
Route::get('/login', [Cntl\LoginController::class,"index"])->name("login")->middleware("guest");
Route::post('/login', [Cntl\LoginController::class,"login"])->name("log")->middleware("guest");
Route::post('/logout', [Cntl\LoginController::class,"logout"])->name("logout")->middleware("auth");
Route::get('/reset', [Cntl\LoginController::class,"reset"])->name("password.reset")->middleware("guest");
Route::post('/request', [Cntl\LoginController::class,"request"])->name("password.request")->middleware("guest");
Route::get('/confirm', [Cntl\LoginController::class,"confirm"])->name("password.confirm")->middleware("guest");
Route::post('/change_password', [Cntl\LoginController::class,"save"])->name("password.save")->middleware("guest");

Route::get("/admin", [Cntl\AdminController::class, "index"])->name("admin")->middleware(["auth", Mdw\Admin::class]);
Route::middleware(["auth",Mdw\Admin::class])->group(function (){
    Route::get("/admin/{tab}", [Cntl\AdminController::class,"tab"])->name("tab");
});
