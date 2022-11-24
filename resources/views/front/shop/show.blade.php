@extends('front.layout.master')

@section('title','Chi tiết sản phẩm')

@section('body')
<!-- {{-- Breadcrumb Section Begin --}} -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{route('index')}}"><i class="fa fa-home"></i>Trang chủ</a>
                    <a href="{{route('shop')}}">Sản phẩm</a>
                    <span>Chi tiết sản phẩm</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- {{-- Breadcrumb Section End --}} -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('front.shop.components.products-sidebar-filter')

                
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-pic-zoom">
                            <img class="product-big-img" src="{{asset($product->image)}}" alt="{{$product->name}}">
                            <div class="zoom-icon">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div> 
                         <div class="product-thumbs"> 
                            <div class="product-thumbs-track ps-slider owl-carousel">
                                <div class="pt active" data-imgbigurl="{{asset($product->image)}}">
                                    <img src="{{asset($product->image)}}" alt="">
                                </div>   
                            </div>
                         </div>  
                    </div>
                   
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd title">
                                <h3>{{$product->name}}</h3>
                                <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                            </div>
                            <div class="pd-desc">
                                <p>{!! $product->description !!}</p>
                                <h4>{{number_format($product->price, 0, ',', '.')}} VND</h4>  
                            </div>
                            <div class="quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                    {{-- <a href="javascript:addCart({{$product->id}})" class="primary-btn pd-cart">Thêm vào giỏ</a> --}}
                                    <a href="javascript:AddCart({{$product->id}})" class="primary-btn pd-cart">Thêm vào giỏ</a>
                                </div>
                            </div>
                            <ul class="pd-tags">
                                <li><span>Danh mục: </span>{{ $product->category->name }}</li>
                            </ul>
                            <div class="pd-share">
                                <div class="p-code">
                                    Mã : {{$product->id}}
                                </div>
                                <div class="pd-social">
                                    <a href="#"><i class="ti-facebook"></i></a>
                                    <a href="#"><i class="ti-twitter-alt"></i></a>
                                    <a href="#"><i class="ti-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
<!-- Product Shop Section End  -->

<!-- Related Products Section Begin  -->
<div class="ralated-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>SẢN PHẨM LIÊN QUAN</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($relatedProducts as $product)
                <div class="col-lg-3 col-sm-6">
                    
                    @include('front.components.product-item-related')
                    
                </div>
            @endforeach  
        </div>
    </div>
</div>
<!-- Related Products Section End  -->
@endsection
