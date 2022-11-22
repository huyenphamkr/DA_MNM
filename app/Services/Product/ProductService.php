<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\BaseService;

class ProductService extends BaseService implements ProductServiceInterface
{
    // ghi đè và khởi tạo giá trị cho biến $repository
    public $repository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function find($id){
        $product = $this->repository->find($id);

        return $product;

    }
    // Hàm lấy các sản phẩm liên quan
    public function getRelatedProducts($product, $limit = 4)
    {
        return $this->repository->getRelatedProducts($product, $limit);
    }

    // hàm lấy các sản phẩm nổi bật
    public function getFeaturedProducts()
    {
        return [
            "Trang tri" => $this->repository->getFeaturedProductsByCategory('1')
        ];
    }

    // Hàm phân trang sản phẩm
    public function getProductOnIndex($request)
    {
        return $this->repository->getProductOnIndex($request);
    }

    // Hàm phân loại sản phẩm theo danh mục
    public function getProductsByCategory($categoryName, $request)
    {
        return $this->repository->getProductsByCategory($categoryName, $request);
    }
}