<?php
namespace App\Repositories\Product;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\BaseRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }

    // hàm lấy các sản phẩm liên quan
    public function getRelatedProducts($product , $limit = 4)
    {
        return $this->model->where('category_id', $product->category_id)
        ->where('category_id', $product->category_id)
        ->limit($limit)
        ->get();
    }

    // hàm lấy các sản phẩm nổi bật
    public function getFeaturedProductsByCategory(int $categoryId)
    {
        return $this->model->where('feature',1)
        ->where('category_id', $categoryId)
        ->get();
    }

    // phân trang sản phẩm lọc sản phẩm
    public function getProductOnIndex($request)
    {
       
        $search = $request->search ?? '';

        $products = $this->model->where('name' , 'like', '%' .$search. '%');

        $products = $this->sortAndPagination($products, $request);
        

        return $products;
    }
    // Phân loại sản phẩm theo danh mục
    public function getProductsByCategory($categoryName, $request)
    {
        $products = Category::where('name', $categoryName)->first()->product->toQuery();

        $products = $this->sortAndPagination($products, $request);

        return $products;
    }

    private function sortAndPagination($products, Request $request)
    {
        $perPage = $request->show ?? 9;
        $sortBy = $request->sort_by ?? 'latest';

        switch($sortBy){
            case 'latest':
                $products = $products->orderBy('id');
                break;
            case 'oldest':
                $products = $products->orderByDesc('id');
                break;
            case 'name-ascending':
                $products = $products->orderBy('name');
                break;
            case 'name-descending':
                $products = $products->orderByDesc('name');
                break;
            case 'price-ascending':
                $products = $products->orderBy('price');
                break;
            case 'price-descending':
                $products = $products->orderByDesc('price');
                break;
            default:
                $products = $products->orderBy('id');
            
        }

        $products = $products->paginate($perPage);
        
        $products->appends(['sort_by' => $sortBy,'show' => $perPage]);

        return $products;
    }
}