<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Category\CategoryServiceInterface;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $productService;
    private $categoryService;
    

    public function __construct(ProductServiceInterface $productService,
                                CategoryServiceInterface $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        
    }
    // Thêm hàm show trong controller
    public function show($id)
    {
        $categories = $this->categoryService->all();
        $product = $this->productService->find($id);
        $relatedProducts = $this->productService->getRelatedProducts($product);
        
        return view('front.shop.show', compact('product','relatedProducts','categories'));
    }

    // Sản phẩm
    public function index(Request $request)
    {
        // danh mục
       $categories = $this->categoryService->all();
        // sản phẩm
        $products = $this->productService->getProductOnIndex($request);
        return view('front.shop.index',compact('products','categories'));
    }
    // lọc sản phẩm theo danh mục
    public function category($categoryName, Request $request)
    {
        $categories = $this->categoryService->all();
        
        $products = $this->productService->getProductsByCategory($categoryName, $request);
        return view('front.shop.index',compact('products','categories'));
    }
}
