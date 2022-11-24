@extends('front.layout.master')

@Section('title', 'Chi tiết đơn hàng')

@Section('body')

<!-- {{-- Breadcrumb Section Begin --}} -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="./"><i class="fa fa-home"></i>Trang chủ</a>
                    <a href="my-order">Đơn hàng của tôi</a>
                    <span>Chi tiết đơn hàng</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- {{-- Breadcrumb Section End --}} -->


<!-- My Order Section Begin -->
<div class="checkout-section spad">
    <div class="container">
        <form action="" class="checkout-form">
            <div class="row">
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <a href="#" class="content-btn">
                            Mã đơn hàng: {{$order->id}}
                        </a>
                    </div>
                    <h4>Chi tiết đơn hàng </h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="name">Họ và tên </label>
                            <input type="text" id="name" name="name" value="{{$user->name}}">
                        </div>
                        <div class="col-lg-12">
                            <label for="email">Địa chỉ email </label>
                            <input type="text" id="email" name="email" value="{{$user->email}}">
                        </div>
                        <div class="col-lg-12">
                            <label for="address">Địa chỉ nhà </label>
                            <input type="text" id="address" name="address" value="{{$user->address}}">
                        </div>
                        <div class="col-lg-12">
                            <label for="phone_number">Số điện thoại </label>
                            <input type="text" id="phone_number" name="phone_number" value="{{$user->phone_number}}">
                        </div>
                        {{-- @endforeach --}}
                    </div>
                </div>
              
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <a href="" class="content-btn">
                            Trạng thái đơn hàng: <b>{{$order->status->name}}</b>
                        </a>
                    </div>
                    <div class="place-order">
                        <h4>Đơn hàng của bạn</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Sản phẩm <span>Tổng tiền</span></li>
                                @foreach($orders as $order)
                                    @foreach ($order->products as $product)   
                                        <li class="fw-normal" style="display:flex">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <img src="{{asset($product->image)}}" alt="{{$product->name}}" >
                                                </div>
                                                <div class="col-lg-6">
                                                    {{$product->name}} <b>x</b> {{$product->pivot->quantity}}
                                                </div>
                                                <div class="col-lg-4">
                                                    <span>{{number_format($product->pivot->price*$product->pivot->quantity, 0, ',', '.')}} VND</span>
                                                </div>
                                            </div>                                          
                                        </li>
                                    @endforeach
                                @endforeach 

                            </ul> 
                            <div class="payment-check">
                                <div class="pc-item">
                                       <b>Phương thức thanh toán:</b> {{$order->payment}}
                                </div>
                            </div>
                               @if ($order->status_id == 1)
                                <div class="order-btn">
                                   <a class="site-btn place-btn" href="{{url('account/my-order/delete/'.$order->id.'')}}">Hủy đơn hàng</a>
                                </div>
                               @endif                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</div>

<!-- My Order Section End -->

@endsection


