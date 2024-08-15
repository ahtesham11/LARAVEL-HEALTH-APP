<?php
use App\Http\Controllers\UserController;

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
// Route::get('/dashboard', function () {
//     return view('Admin/index');
// });
Route::get('/login', function () {
    return view('Admin/login');
});
Route::get('/register', function () {
    return view('Admin/login');
});
Route::get('/recover', function () {
    return view('Admin/recover_password');
});
Route::view('register','Admin/register')->name('register');
Route::view('login','admin/login')->name('login');
Route::get('dashboard',[UserController::class,'dashboardPage'])->name('dashboard');
Route::view('logincomplete','Admin/index')->name('logincomplete');
Route::post('loginuser',[UserController::class,'loginuser'])->name('loginuser');
Route::post('registeruser',[UserController::class,'registeruser'])->name('registeruser');
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
// });

