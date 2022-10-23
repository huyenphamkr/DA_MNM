<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\CategoryController;
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
// Route::middleware(['auth'])->group(function(){
//     Route::get('admin', [HomeController::class, 'index'])->name('home');   
//     Route::get('admin/main',[HomeController::class,'index']);   
//  });

 Route::middleware(['auth'])->group(function(){
    
    Route::prefix('admin')->group(function (){

    // Sửa đường dẫn trang chủ mặc định
    Route::get('/', [HomeController::class,'index'])->name('home');
    Route::get('home', [HomeController::class,'index'])->name('home');  

    //Danh mục Category
    Route::prefix('category')->group(function (){
        //Thêm danh mục
        Route::get('add',[CategoryController::class,'create']);
        Route::post('add',[CategoryController::class,'store']);
        //Hiển thị danh sách danh mục
        Route::get('list',[CategoryController::class,'index']);
        //Xóa danh mục
        Route::get('destroy/{id}',[CategoryController::class,'destroy']);
        
       // Route::DELETE('destroy',[CategoryController::class,'destroy']);
    });

    });    
 });
 
