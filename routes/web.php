<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Models\Role;
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
    return view('welcome');
});



//Admin -------------------------------Admin-------------------Admin---------------------

//login
Route::get('admin/login', [LoginController::class, 'getLogin'])->name('login');
Route::post('admin/postlogin', [LoginController::class, 'postLogin'])->name('postlogin');

//logout
Route::post('admin/logout', [LogoutController::class, 'getLogout'])->name('logout');

//Auth
Route::middleware(['auth'])->group(function(){
    Route::get('admin', [HomeController::class, 'index'])->name('home');   
    Route::get('admin/main',[HomeController::class,'index']);   
 });
 
