<?php

namespace App\Services\Product;

use App\Services\ServiceInterface;

interface ProductServiceInterface extends ServiceInterface
{
    // Hàm lấy các sản phẩm liên quan
    public function getRelatedProducts($product , $limit = 4);
    // San pham noi bat
    public function getFeaturedProducts();
    // Phân trang sản phẩm
    public function getProductOnIndex($request);
    // Phân loại sản phẩm theo danh mục
    public function getProductsByCategory($categoryName, $request);
}