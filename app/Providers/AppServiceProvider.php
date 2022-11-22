<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Category\CategoryService;
use App\Services\Category\CategoryServiceInterface;
use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // product
        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->singleton(
            ProductServiceInterface::class,
            ProductService::class
        );

        // product
        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->singleton(
            CategoryServiceInterface::class,
            CategoryService::class
        );

        // user

        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class   
        );
        $this->app->singleton(
            UserServiceInterface::class,
            UserService::class   
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}






// <!-- 

// namespace App\Providers;

// use Illuminate\Support\ServiceProvider;

// class AppServiceProvider extends ServiceProvider
// {
//     public function register()
//     {
//         //
//     }

    
//     public function boot()
//     {
//         //
//     }
// }  -->
