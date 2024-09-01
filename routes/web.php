<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomAdd;
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
Route::get('/recover', function (){
    return view('Admin/recover_password');
});
Route::view('register','admin/register')->name('register');
Route::view('login','admin/login')->name('login');
Route::get('dashboard', [UserController::class, 'dashboardPage'])
    ->name('dashboard')
    ->middleware('webgard');
Route::view('logincomplete','Admin/main_dashboard')->name('logincomplete')->middleware('webgard');;
Route::post('loginuser',[UserController::class,'loginuser'])->name('loginuser');
Route::post('registeruser',[UserController::class,'registeruser'])->name('registeruser');
Route::get('logout',[UserController::class,'logout'])->name('logout');
Route::get('/rooms', [RoomAdd::class, 'index'])->name('rooms.index');

Route::get('/rooms/{id}/edit', [RoomAdd::class, 'edit'])->name('rooms.edit');
Route::put('/rooms/{id}', [RoomAdd::class, 'update'])->name('rooms.update');
Route::post('/rooms/{id}/toggle', [RoomAdd::class, 'toggleStatus'])->name('rooms.toggleStatus');