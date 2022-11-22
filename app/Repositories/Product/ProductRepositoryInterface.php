<?php
namespace App\Repositories\Product;

use App\Repositories\RepositoriesInterface;

interface ProductRepositoryInterface extends RepositoriesInterface 
{
    //    Hàm lấy các sản phẩm liên quan
    public function getRelatedProducts($product , $limit = 4);
    //  Hàm lấy sản phẩm nổi bật
    public function getFeaturedProductsByCategory(int $categoryId);
    //  Hàm phân trang sản phẩm
    public function getProductOnIndex($request);
    // Hàm phân loại sản phẩm theo danh mục
    public function getProductsByCategory($categoryName, $request);

}