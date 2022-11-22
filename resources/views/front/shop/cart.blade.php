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
<div class="shopping-cart spad">
    <div class="container">
        <div class="row">
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
                                <th><i class="ti-close"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                           
                           @foreach ($carts as $cart)
                            <tr data-rowId="{{$cart->rowId}}">
                                <td class="cart-pic"><img src="{{asset($cart->options->images)}}" alt="" style="height: 170px; width: 170px"></td>
                                <td class="cart-title">
                                    <h5>{{ $cart->name }}</h5>
                                </td>
                                <td class="p-price">{{number_format($cart->price, 0, ',', '.')}} VND</td>
                                <td class="qua-col">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="{{$cart->qty}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price">{{number_format($cart->price * $cart->qty,0,',','.')}} VND</td>
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
                            <a href="shop" class="primary-btn continue-shop">Tiếp tục mua sắm</a>
                            <a href="#" class="primary-btn up-cart">Cập nhật giỏ hàng</a>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Tạm tính <span>{{$subtotal}} VND</span></li>
                                <li class="cart-total">Tổng tiền <span>{{$total}} VND</span></li>
                            </ul>
                            <a href="check-out.html" class="proceed-btn">Đặt hàng</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- Shopping Cart section End -->
@endsection

