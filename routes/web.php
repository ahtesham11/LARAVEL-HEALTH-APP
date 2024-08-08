<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/ahtesham', function () {
    return view('ahtesham');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/ahtesham', function () {
    return view('ahtesham');
});
Route::get('/dashboard', function () {
    return view('Admin/index');
});
Route::get('/login', function () {
    return view('Admin/login');
});
Route::get('/register', function () {
    return view('Admin/login');
});
Route::get('/recover', function () {
    return view('Admin/recover_password');
});
Route::view('login','Admin/login')->name('login');
Route::post('loginuser',[userController::class,'loginuser'])->name('loginuser');