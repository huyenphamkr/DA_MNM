<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Warehouse\OrdersController as WarehouseOrdersController;
use App\Http\Controllers\Admin\Warehouse\ProductController as WarehouseProductController;
use App\Http\Controllers\Admin\Warehouse\PurchaseController as WarehousePurchaseController;
use App\Http\Controllers\Admin\Warehouse\SupplierController as WarehouseSupplierController;


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
    // x??a to??n b??? gi??? h??ng
    Route::get('destroy', [CartController::class,'destroy']);
    // c???p nh???t gi??? h??ng
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
GET => index => danh s??ch
GET => create => form th??m m???i
POST => store => khi submit form th??m m???i
GET => show => xem chi ti???t
PUT => edit => khi submit form edit
DELETE => destroy => khi x??a
*/ 

//Admin -------------------------------Admin-------------------Admin---------------------

//login
Route::get('admin/login', [HomeController::class, 'getLogin'])->name('login');
Route::post('admin/postlogin', [HomeController::class, 'postLogin'])->name('postlogin');
//x??c th???c t??i kho???n
Route::get('admin/get-actived',[HomeController::class,'getActived'])->name('admin.getActived');
Route::post('admin/get-actived',[HomeController::class,'postActived']);

//logout
Route::post('admin/logout', [HomeController::class, 'getLogout'])->name('logout');

// ????ng k?? th??nh vi??n
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
        
        // S???a ???????ng d???n trang ch??? m???c ?????nh
        Route::get('/', [HomeController::class,'index'])->name('home');
        Route::get('home', [HomeController::class,'index'])->name('home');  

        //Danh m???c Category
        Route::prefix('category')->group(function (){
            //Th??m
            Route::get('add',[CategoryController::class,'create']);
            Route::post('add',[CategoryController::class,'store']);
            //Hi???n th??? danh s??ch
            Route::get('list',[CategoryController::class,'index']);
            //X??a
            Route::get('destroy/{id}',[CategoryController::class,'destroy']);
            //C???p nh???t
            Route::get('edit/{id}',[CategoryController::class,'edit']);
            Route::post('edit/{id}',[CategoryController::class,'update']);        
        });

        //S???n ph???m Product
        Route::prefix('product')->group(function (){
            //Hi???n th??? danh s??ch
            Route::get('list',[ProductController::class,'index']);
            //Th??m
            Route::get('add',[ProductController::class,'create']);
            Route::post('add',[ProductController::class,'store']);
            //C???p nh???t
            Route::get('edit/{id}',[ProductController::class,'edit']);
            Route::post('edit/{id}',[ProductController::class,'update']);
            //X??a
            Route::get('destroy/{id}',[ProductController::class,'destroy']);                  
        });

        //Slide
        Route::prefix('slide')->group(function (){
            //Hi???n th??? danh s??ch
            Route::get('list',[SlideController::class,'index']);
            //Th??m
            Route::get('add',[SlideController::class,'create']);
            Route::post('add',[SlideController::class,'store']);
            //C???p nh???t
            Route::get('edit/{id}',[SlideController::class,'edit']);
            Route::post('edit/{id}',[SlideController::class,'update']);
            //X??a
            Route::get('destroy/{id}',[SlideController::class,'destroy']);                  
        });

         //H??a ????n Orders
        Route::prefix('orders')->group(function (){
            //Hi???n th??? danh s??ch
            Route::get('list',[OrdersController::class,'index'])->name('filter');
            //Th??m h??a ????n
            Route::get('add',[OrdersController::class,'create']);
            Route::post('adddetail/{id}',[OrdersController::class,'adddetail']);
            Route::post('add',[OrdersController::class,'store']);
            Route::post('add/load',[OrdersController::class,'getProducts']);    
            //C???p nh???t
            Route::get('show/{id}',[OrdersController::class,'show']);
            Route::post('show/update/{ordersid}/{statusid}',[OrdersController::class,'update']);
            //X??a
            Route::get('destroy/{id}',[OrdersController::class,'destroy']);  
            //in  
            Route::get('print/{id}',[OrdersController::class,'print']);       
            //l???y th??ng tin kh??ch h??ng qua id
            Route::post('getinfo/{id}',[OrdersController::class,'getInfoID']);       
            //t??m ki???m
            Route::get('add/search',[OrdersController::class,'getProducts']);  
        });

        //phi???u nh???p
        Route::prefix('purchase')->group(function (){
            //Hi???n th??? danh s??ch
            Route::get('list',[PurchaseController::class,'index']);
            //Xem chi ti???t
            Route::get('show/{id}',[PurchaseController::class,'show']);
            //in  
            Route::get('print/{id}',[PurchaseController::class,'print']);     
            //Th??m
            Route::get('add',[PurchaseController::class,'create']);
            Route::post('add',[PurchaseController::class,'store']);      
            Route::post('add/load',[PurchaseController::class,'getProducts']);             
            Route::post('detail/{id}',[PurchaseController::class,'add']);
            //t??m ki???m
            Route::get('add/search',[PurchaseController::class,'getProducts']);              
        });    

        //User
        Route::prefix('account')->group(function (){
            //Hi???n th??? danh s??ch
            Route::get('list',[UserController::class,'index']);
            // //Th??m
            Route::get('add',[UserController::class,'create']);
            Route::post('add',[UserController::class,'store']);
            // //C???p nh???t
             Route::get('edit/{id}',[UserController::class,'edit']);
             Route::post('edit/{id}',[UserController::class,'update']);
            // //X??a
            // Route::get('destroy/{id}',[UserController::class,'destroy']);                  
        });

         //kh??ch h??ng
         Route::prefix('customer')->group(function (){
            //Hi???n th??? danh s??ch
            Route::get('list',[CustomerController::class,'index']);
            // //Th??m
            Route::get('add',[CustomerController::class,'create']);
            Route::post('add',[CustomerController::class,'store']);
            // //C???p nh???t
             Route::get('edit/{id}',[CustomerController::class,'edit']);
             Route::post('edit/{id}',[CustomerController::class,'update']);
            // //X??a
            // Route::get('destroy/{id}',[UserController::class,'destroy']);                  
        });

        //Nh?? cung c???p- Supplier
        Route::prefix('supplier')->group(function (){
            //Th??m
            Route::get('add',[SupplierController::class,'create']);
            Route::post('add',[SupplierController::class,'store']);
            //Hi???n th??? danh s??ch
            Route::get('list',[SupplierController::class,'index']);
            //X??a
            Route::get('destroy/{id}',[SupplierController::class,'destroy']);
            //C???p nh???t
            Route::get('edit/{id}',[SupplierController::class,'edit']);
            Route::post('edit/{id}',[SupplierController::class,'update']);        
        });

         //Th???ng k??
         Route::prefix('statistic')->group(function (){
             //Hi???n th??? danh s??ch
            Route::get('vip',[StatisticController::class,'vip'])->name('vip');            
        });  

        //Qu???n l?? kho
        Route::prefix('warehouse')->group(function (){
            // S???a ???????ng d???n trang ch??? m???c ?????nh
            Route::get('/', [HomeController::class,'index'])->name('home');
            Route::get('home', [HomeController::class,'index'])->name('home');  

            //S???n ph???m Product
            Route::prefix('product')->group(function (){
                //Hi???n th??? danh s??ch
                Route::get('list',[WarehouseProductController::class,'index']);
                //Th??m
                Route::get('add',[WarehouseProductController::class,'create']);
                Route::post('add',[WarehouseProductController::class,'store']);
                //C???p nh???t
                Route::get('edit/{id}',[WarehouseProductController::class,'edit']);
                Route::post('edit/{id}',[WarehouseProductController::class,'update']);
                //X??a
                Route::get('destroy/{id}',[WarehouseProductController::class,'destroy']);                  
            });
            //H??a ????n Orders
            Route::prefix('orders')->group(function (){
                //Hi???n th??? danh s??ch
                Route::get('list',[WarehouseOrdersController::class,'index'])->name('warehousefilter');
                //Th??m h??a ????n
                Route::get('add',[WarehouseOrdersController::class,'create']);
                Route::post('adddetail/{id}',[WarehouseOrdersController::class,'adddetail']);
                Route::post('add',[WarehouseOrdersController::class,'store']);
                Route::post('add/load',[WarehouseOrdersController::class,'getProducts']);    
                //C???p nh???t
                Route::get('show/{id}',[WarehouseOrdersController::class,'show']);
                Route::post('show/update/{ordersid}/{statusid}',[WarehouseOrdersController::class,'update']);
                //X??a
                Route::get('destroy/{id}',[WarehouseOrdersController::class,'destroy']);  
                //in  
                Route::get('print/{id}',[WarehouseOrdersController::class,'print']);       
                //l???y th??ng tin kh??ch h??ng qua id
                Route::post('getinfo/{id}',[WarehouseOrdersController::class,'getInfoID']);       
                //t??m ki???m
                Route::get('add/search',[WarehouseOrdersController::class,'getProducts']);  
            });
            //phi???u nh???p
            Route::prefix('purchase')->group(function (){
                //Hi???n th??? danh s??ch
                Route::get('list',[WarehousePurchaseController::class,'index']);
                //Xem chi ti???t
                Route::get('show/{id}',[WarehousePurchaseController::class,'show']);
                //in  
                Route::get('print/{id}',[WarehousePurchaseController::class,'print']);     
                //Th??m
                Route::get('add',[WarehousePurchaseController::class,'create']);
                Route::post('add',[WarehousePurchaseController::class,'store']);      
                Route::post('add/load',[WarehousePurchaseController::class,'getProducts']);             
                Route::post('detail/{id}',[WarehousePurchaseController::class,'add']);
                //t??m ki???m
                Route::get('add/search',[WarehousePurchaseController::class,'getProducts']);              
            });    

            //Nh?? cung c???p- Supplier
            Route::prefix('supplier')->group(function (){
                //Th??m
                Route::get('add',[WarehouseSupplierController::class,'create']);
                Route::post('add',[WarehouseSupplierController::class,'store']);
                //Hi???n th??? danh s??ch
                Route::get('list',[WarehouseSupplierController::class,'index']);
                //X??a
                Route::get('destroy/{id}',[WarehouseSupplierController::class,'destroy']);
                //C???p nh???t
                Route::get('edit/{id}',[WarehouseSupplierController::class,'edit']);
                Route::post('edit/{id}',[WarehouseSupplierController::class,'update']);        
            });
            //Th???ng k??
        //     Route::prefix('statistic')->group(function (){
        //         //Hi???n th??? danh s??ch
        //        Route::get('revenue',[WarehouseStatisticController::class,'revenue'])->name('WarehouseRevenue');            
        //    }); 
        });
        
        
        
    });
});
