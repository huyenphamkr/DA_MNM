<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PurchaseController;
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
    Auth::logout();
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
            Route::get('list',[OrdersController::class,'index'])->name('filter');
            //Thêm hóa đơn
            Route::get('add',[OrdersController::class,'create']);
            Route::post('adddetail/{id}',[OrdersController::class,'adddetail']);
            Route::post('add',[OrdersController::class,'store']);
            Route::post('add/load',[OrdersController::class,'getProducts']);    
            //Cập nhật
            Route::get('show/{id}',[OrdersController::class,'show']);
            Route::post('show/update/{ordersid}/{statusid}',[OrdersController::class,'update']);
            //Xóa
            Route::get('destroy/{id}',[OrdersController::class,'destroy']);  
            //in  
            Route::get('print/{id}',[OrdersController::class,'print']);       
            //lấy thông tin khách hàng qua id
            Route::post('getinfo/{id}',[OrdersController::class,'getInfoID']);       
            //tìm kiếm
            Route::get('add/search',[OrdersController::class,'getProducts']);  
        });

        //phiếu nhập
        Route::prefix('purchase')->group(function (){
            //Hiển thị danh sách
            Route::get('list',[PurchaseController::class,'index']);
            //Xem chi tiết
            Route::get('show/{id}',[PurchaseController::class,'show']);
            //in  
            Route::get('print/{id}',[PurchaseController::class,'print']);     
            //Thêm
            Route::get('add',[PurchaseController::class,'create']);
            Route::post('add',[PurchaseController::class,'store']);      
            Route::post('add/load',[PurchaseController::class,'getProducts']);             
            Route::post('detail/{id}',[PurchaseController::class,'add']);
            //tìm kiếm
            Route::get('add/search',[PurchaseController::class,'getProducts']);              
        });    
    });
});
//Route::get('test', [PurchaseController::class,'test']);
// Route::get('test',function()
// { 
//     return view('admin.purchase.test');
// });
