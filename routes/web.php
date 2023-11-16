<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Cntl;

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
