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
})->name('index');
Route::get('/ahtesham', function () {
    return view('ahtesham');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
// Route::get('/ahtesham', function () {
//     return view('ahtesham');
// });
// Route::get('/dashboard', function () {
//     return view('Admin/index');
// });
// Route::get('/login', function () {
//     return view('Admin/login');
// });
// Route::get('/register', function () {
//     return view('Admin/login');
// });
Route::get('/recover', function () {
    return view('Admin/recover_password');
});
Route::view('register','Admin/register')->name('register')->middleware('webgard');;
Route::view('login','admin/login')->name('login');
Route::get('dashboard', [UserController::class, 'dashboardPage'])
    ->name('dashboard')
    ->middleware('webgard');
Route::view('logincomplete','Admin/index')->name('logincomplete')->middleware('webgard');;
Route::post('loginuser',[UserController::class,'loginuser'])->name('loginuser');
Route::post('registeruser',[UserController::class,'registeruser'])->name('registeruser');
Route::get('logout',[UserController::class,'logout'])->name('logout');
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
// });

