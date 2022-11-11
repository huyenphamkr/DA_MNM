<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SlideController;
use Illuminate\Support\Facades\Auth;
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
    // Auth::logout();
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
Route::get('admin/login', [HomeController::class, 'getLogin'])->name('login');
Route::post('admin/postlogin', [HomeController::class, 'postLogin'])->name('postlogin');

//logout
Route::post('admin/logout', [HomeController::class, 'getLogout'])->name('logout');

//reset password
Route::get('admin/forget-password', [HomeController::class, 'getForgetPass'])->name('ForgetPass');
Route::post('admin/forget-password', [HomeController::class, 'postForgetPass']);
Route::get('admin/get-password/{user}/{token}', [HomeController::class, 'getPass'])->name('getPass');
Route::post('admin/get-password/{user}/{token}', [HomeController::class, 'postPass']);

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

         //Hóa đơn Orders
         Route::prefix('orders')->group(function (){
            //Hiển thị danh sách
            Route::get('list',[OrdersController::class,'index']);
            //Thêm
            Route::get('add',[OrdersController::class,'create']);
            Route::post('add',[OrdersController::class,'store']);
            //Cập nhật
            Route::get('show/{id}',[OrdersController::class,'show']);
            // Route::post('update',[OrdersController::class,'update']);
            Route::post('update/{orderid}/{statusid}',[OrdersController::class,'update']);

            //Xóa
            Route::get('destroy/{id}',[OrdersController::class,'destroy']);    
            //in  
            Route::get('print/{id}',[OrdersController::class,'print']);                 
        });
    });    
 });

// Route::get('test', [OrdersController::class,'test']);
// Route::get('testa',function()
// {
//     $orders = Orders::find('1')->with('products')->first();
//     print "<pre>";
// print_r($orders);
// print "</pre>";
// });
