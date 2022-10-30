<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\User\LogoutController;
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
/*
GET => index => danh sách
GET => create => form thêm mới
POST => store => khi submit form thêm mới
GET => show => xem chi tiết
PUT => edit => khi submit form edit
DELETE => destroy => khi xóa
*/ 

//Admin -------------------------------Admin-------------------Admin---------------------

//login
Route::get('admin/login', [LoginController::class, 'getLogin'])->name('login');
Route::post('admin/postlogin', [LoginController::class, 'postLogin'])->name('postlogin');

//logout
Route::post('admin/logout', [LogoutController::class, 'getLogout'])->name('logout');


Route::middleware(['auth'])->group(function(){
    
    Route::prefix('admin')->group(function (){
        
        // Sửa đường dẫn trang chủ mặc định
        Route::get('/', [HomeController::class,'index'])->name('home');
        Route::get('home', [HomeController::class,'index'])->name('home');  

        //Danh mục Category
        Route::prefix('category')->group(function (){
            //Thêm
            Route::get('add',[CategoryController::class,'create']);
            Route::post('add',[CategoryController::class,'store']);
            //Hiển thị danh sách
            Route::get('list',[CategoryController::class,'index']);
            //Xóa
            Route::get('destroy/{id}',[CategoryController::class,'destroy']);
            //Cập nhật
            Route::get('edit/{id}',[CategoryController::class,'edit']);
            Route::post('edit/{id}',[CategoryController::class,'update']);        
        });

        //Sản phẩm Product
        Route::prefix('product')->group(function (){
            //Hiển thị danh sách
            Route::get('list',[ProductController::class,'index']);
            //Thêm
            Route::get('add',[ProductController::class,'create']);
            Route::post('add',[ProductController::class,'store']);
            //Cập nhật
            Route::get('edit/{id}',[ProductController::class,'edit']);
            Route::post('edit/{id}',[ProductController::class,'update']);
            //Xóa
            Route::get('destroy/{id}',[ProductController::class,'destroy']);                  
        });

        //Slide
        Route::prefix('slide')->group(function (){
            //Hiển thị danh sách
            Route::get('list',[SlideController::class,'index']);
            //Thêm
            Route::get('add',[SlideController::class,'create']);
            Route::post('add',[SlideController::class,'store']);
            //Cập nhật
            Route::get('edit/{id}',[SlideController::class,'edit']);
            Route::post('edit/{id}',[SlideController::class,'update']);
            //Xóa
            Route::get('destroy/{id}',[SlideController::class,'destroy']);                  
        });
    });    
 });
 
