@extends('front.layout.master')

@section('title','Đơn hàng của tôi')

@section('body')

<!-- {{-- Breadcrumb Section Begin --}} -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="{{route('index')}}"><i class="fa fa-home"></i>Trang chủ</a>
                    <span>Đơn hàng của tôi</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- {{-- Breadcrumb Section End --}} -->

{{-- My Order Section Begin --}}
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                @if (count($orderListUser) == 0)                            
                    <h4 style="margin: 0 auto">
                        {{"Bạn chưa đặt đơn hàng nào cả. Không có đơn hàng"}}                                    
                    </h4>         <br>                   
                @endif

                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã đơn hàng</th>
                                <th>Hình ảnh</th>                              
                                <th class="p-name">Tên sản phẩm</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $key=1;
                            $stt = 1
                            ?>
                            
                            @foreach($orderListUser as $orders)
                           
                           
                             <?php $orderPro = $orders->where('id','=',$orders->id)->with('products')->get();?>
                        
                             @foreach($orderPro as $order)
                                @foreach ($order->products as $product) 
                                <?php $key++;?>
                                <tr>                                    
                                    <td class="first-row" style="text-align: center">
                                        {{$stt++}}
                                        
                                    </td>

                                    <td class="first-row">
                                        {{$orders->id}}
                                    </td>

                                    <td class="cart-pic first-row "style="text-align: center">
                                        <img src="{{asset($product->image)}}" alt="{{$product->name}}" style="height: 100px;margin: 0 auto;">
                                    </td>
                                  
                                    <td class="cart-title first-row">
                                        <h5>                                        
                                            {{$product->name}}                                            
                                            @if (count($order->orderDetails)>1)
                                                và {{ count($order->orderDetails)-1 }} sản phẩm khác
                                            @endif                                            
                                        </h5>
                                    </td>
                                        @if ($key == 2)
                                            @break;
                                        @endif                                   
                                @endforeach
                                @if ($key == 2)
                                <?php $key=1;?>
                                    @break;
                                @endif
                            @endforeach
                                    <td class="total-price first-row">
                                        {{ number_format($orders->total, 0, ',', '.')}}VND
                                    </td>
                                    @if ($order->status_id == 6)
                                    
                                        <?php $color = "red"?>
                                    
                                    @else
                                    
                                        @if ($order->status_id == 1)
                                            <?php $color = "blue"?>
                                        @else
                                            <?php $color = "black"?>
                                        @endif
                                    
                                        
                                    @endif
                                    <td class="first-row" style="color:{{$color}}">
                                        {{$orders->status->name}}
                                    </td>
                                    <td class="first-row">
                                        <a class="btn" href="{{url('account/my-order/show/'.$orders->id.'')}}">Chi tiết</a>
                                    </td>
                                </tr>                          
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>

{{-- My Order Section End --}}


@endsection