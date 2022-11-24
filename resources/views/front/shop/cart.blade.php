@extends('front.layout.master')

@section('title','Giỏ hàng')

@section('body')
<!-- {{-- Breadcrumb Section Begin --}} -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{route('index')}}"><i class="fa fa-home"></i>Trang chủ</a>
                    <a href="{{route('shop')}}">Sản phẩm</a>
                    <span>Giỏ hàng</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- {{-- Breadcrumb Section End --}} -->


<!-- Shopping Cart section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">

            @if(Cart::count()>0)
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th class="p-name">Tên sản phẩm</th>
                                    <th>Giá tiền</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    {{-- Xóa toàn bộ giỏ hàng --}}
                                    <th>
                                        <i onclick="confirm('Bạn có chắc chắn xóa tất cả các sản phẩm trong giỏ hàng?') === true ?  destroyCart() : '' " 
                                        style="cursor: pointer" class="ti-close"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>                            
                            @foreach ($carts as $cart)
                                <tr data-rowid="{{$cart->rowId}}">
                                    <td class="cart-pic first-row"><img src="{{asset($cart->options->images)}}" alt="" style="height: 170px;"></td>
                                    <td class="cart-title first-row">
                                        <h5>{{ $cart->name }}</h5>
                                    </td>
                                    <td class="p-price first-row">{{number_format($cart->price, 0, ',', '.')}} VND</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{$cart->qty}}" data-rowid="{{$cart->rowId}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">{{number_format(($cart->price * $cart->qty),0,',','.')}} VND</td>
                                    <td class="close-td first-row">
                                        <i onclick="removeCart('{{$cart->rowId}}')" class="ti-close"></i>
                                    </td>
                                    
                                </tr>
                            @endforeach
                                    

                            </tbody>
                        </table>
                    </div>
                    <div class="row" style="padding-bottom: 50px">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="{{route('shop')}}" class="primary-btn continue-shop" style="background-color: #e7ab3c; color: black">Tiếp tục mua sắm</a>
                                <a href="#" class="primary-btn up-cart">Cập nhật giỏ hàng</a>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                
                                    <li class="subtotal">Tạm tính <span>{{number_format(str_replace(',', '', number_format(str_replace(',', '', $subtotal))), 0, ',', '.')}} VND</span></li>
                                    <li class="cart-total">Tổng tiền <span>{{number_format(str_replace(',', '', number_format(str_replace(',', '', $subtotal))), 0, ',', '.')}} VND</span></li>
                                </ul>
                                <a href="{{route('checkout')}}" class="proceed-btn">Đặt hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-12">
                    <h5 style="text-align: center">Giỏ hàng của bạn đang rỗng.</h5>
                </div>
            @endif

        </div>
    </div>
</section>
<!-- Shopping Cart section End -->
@endsection

