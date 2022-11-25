<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Front\AccountController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckOutController;
use App\Http\Controllers\Front\IntroduceController;
use App\Http\Controllers\Front\ContactController;
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

// Route::get('/', function () {
//     Auth::logout();
//     return view('welcome');
// });

//front end

// index
Route::get('/', [IndexController::class, 'index'])->name('index');


// product
Route::prefix('shop')->group(function() {
    // Product Detail
    Route::get('product/{id}',[ShopController::class,'show']);
    // product
    Route::get('/', [ShopController::class,'index'])->name('shop');
    // product category
    Route::get('category/{categoryName}', [ShopController::class,'category']);
    
});

// ShoppingCart
Route::prefix('cart')->group(function() {
    Route::get('add', [CartController::class,'add'])->name('add');
    Route::get('/', [CartController::class,'index'])->name('cart');
    Route::get('delete', [CartController::class,'delete']);
    // xóa toàn bộ giỏ hàng
    Route::get('destroy', [CartController::class,'destroy']);
    // cập nhật giỏ hàng
    Route::get('update', [CartController::class,'update']);
});

// Checkout
Route::prefix('checkout')->group(function() {
    Route::get('', [CheckOutController::class,'index'])->name('checkout');
   // Route::middleware(['auth'])->group(function(){
    Route::post('/', [CheckOutController::class,'addOrder']);
    Route::get('/result', [CheckOutController::class,'result']);
    //});
    
});

// introduce
    Route::get('introduce', [IntroduceController::class,'index']);

//contact
    Route::get('contact', [ContactController::class,'index']);


// login
Route::prefix('account')->group(function(){
    Route::get('login',[AccountController::class,'login']);
    Route::post('login',[AccountController::class,'checkLogin']);
    Route::get('logout',[AccountController::class,'logout']);
    Route::get('register',[AccountController::class,'register']);
    Route::post('register',[AccountController::class,'checkRegister']);
    Route::get('get-actived',[AccountController::class,'getActived'])->name('account.getActived');
    Route::post('get-actived',[AccountController::class,'postActived']);
    Route::get('actived/{user}/{token}',[AccountController::class,'actived'])->name('account.actived');
    Route::get('forget',[AccountController::class,'forget']);
    Route::post('forget',[AccountController::class,'postForget']);
    Route::get('reset/{user}/{token}',[AccountController::class,'reset'])->name('reset');
    Route::post('reset/{user}/{token}',[AccountController::class,'postReset']);   

    Route::prefix('my-order')->group(function(){
        Route::get('/',[AccountController::class,'myOrderIndex'])->name('myorder');
        Route::get('show/{id}',[AccountController::class,'myOrderShow']);
        Route::get('delete/{id}',[AccountController::class,'deleteMyOrder']);
    });
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
//xác thực tài khoản
Route::get('admin/get-actived',[HomeController::class,'getActived'])->name('admin.getActived');
Route::post('admin/get-actived',[HomeController::class,'postActived']);

//logout
Route::post('admin/logout', [HomeController::class, 'getLogout'])->name('logout');

// Đăng ký thành viên
Route::get('admin/register', [HomeController::class, 'getRegister'])->name('register');
Route::post('admin/postregister', [HomeController::class, 'postRegister'])->name('postregister');
Route::get('admin/actived/{user}/{token}',[HomeController::class,'actived'])->name('admin.actived');


//Route::post('admin/register', [HomeController::class, 'checkRegister'])->name('checkregister');

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

        //User
        Route::prefix('account')->group(function (){
            //Hiển thị danh sách
            Route::get('list',[UserController::class,'index']);
            // //Thêm
            Route::get('add',[UserController::class,'create']);
            Route::post('add',[UserController::class,'store']);
            // //Cập nhật
             Route::get('edit/{id}',[UserController::class,'edit']);
             Route::post('edit/{id}',[UserController::class,'update']);
            // //Xóa
            // Route::get('destroy/{id}',[UserController::class,'destroy']);                  
        });

        //Nhà cung cấp- Supplier
        Route::prefix('supplier')->group(function (){
            //Thêm
            Route::get('add',[SupplierController::class,'create']);
            Route::post('add',[SupplierController::class,'store']);
            //Hiển thị danh sách
            Route::get('list',[SupplierController::class,'index']);
            //Xóa
            Route::get('destroy/{id}',[SupplierController::class,'destroy']);
            //Cập nhật
            Route::get('edit/{id}',[SupplierController::class,'edit']);
            Route::post('edit/{id}',[SupplierController::class,'update']);        
        });

         //Thống kê
         Route::prefix('statistic')->group(function (){
             //Hiển thị danh sách
            Route::get('vip',[StatisticController::class,'vip'])->name('vip');            
        });        
    });
});
