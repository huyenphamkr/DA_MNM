<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductServiceInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;


class CartController extends Controller
{
    private $productService; 

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('front.shop.cart', compact('carts','total','subtotal'));
    }

    // Hàm thêm sản phẩm vào giỏ hàng
    public function add(Request $request)
    {
        if($request->ajax()){
            $product = $this->productService->find($request->productId);

            $response['cart'] = Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price,
                'weight' => $product->weight ?? 0,
                'options' => [
                    'images'=> $product->image
                ],
            ]);
            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
          

        // dd(Cart::content()); 
        return $response;

        }

        return back();
    }

    // Hàm xóa sản phẩm trong giỏ hàng

    public function delete(Request $request)
    {
        if($request->ajax()){
            $response['cart'] = Cart::remove($request->rowId);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }

        return back();
    }

    // Hàm xóa toàn bộ giỏ hàng

    public function destroy()
    {
        Cart::destroy();    
    }

    // cập nhật giỏ hàng

    public function update(Request $request)
    {
        if($request->ajax()){
            $response['cart'] = Cart::update($request->rowId, $request->qty);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }
    }
}
