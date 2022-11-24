@extends('front.layout.master')

@section('title','Trang chủ')

@section('body')

    <!-- {{-- Hero Section Begin --}} -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            @foreach($slides as $slide)
                <div class="single-hero-items set-bg" data-setbg="{{asset($slide->image)}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5">
                                {{-- <span style="color: #bd7e09" >{{ $slide->name }}</span> --}}
                                <h2 style="color: #bd7e09"> <b>{{ $slide->name }}</b></h2>
                                <p style="color: black">{!! $slide->description !!}</p>
                                <a href="{{route('shop')}}" class="primary-btn">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- {{-- Hero Section End --}} -->

    <!-- {{-- Banner Section Begin --}} -->
    <div class="partner-logo" style="background-color: cadetblue">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                @foreach($categories as $category)
                <div class="logo-item" >
                    <div class="single-banner">
                        <img src="{{asset($category->image)}}" alt="" style="height: 150px" >
                        <div class="inner-text">
                            <a href="{{url('shop/category/'.$category->name.'')}}"><h4 style="padding: 11px 2px">{{$category->name}}</h4></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- <div class="banner-section spad" style="padding: 80px 50px; background-color: rgb(241, 251, 251)">
        <div class="container-fluid">
            <div class="row">
                @foreach($categories as $category)
                <div class="col-lg-3">
                    <div class="single-banner" style="padding: 5px;">
                        <img src="{{asset($category->image)}}" alt="" style="height: 140px">
                        <div class="inner-text">
                            <a href="{{url('shop/category/'.$category->name.'')}}"><h4>{{$category->name}}</h4></a>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </div> --}}
    <!-- {{-- Banner Section End --}} -->


    <!-- {{-- Featured Banner Section Begin --}} -->
    @foreach ($categories as $category)
    @if ($category->id % 2 != 0)
    <section class="women-banner spad" style="padding-top: 10px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="{{$category->image}}">
                        <h2>{{$category->name}}</h2>
                        <a href="{{url('shop/category/'.$category->name.'')}}">Xem thêm</a>
                    </div>
                </div> 
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active"><h3>Sản phẩm nổi bật</h3></li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">    
                        @foreach ($featuredProducts as $product)
                            @if ($product->category_id == $category->id)                        

                                @include('front.components.product-item')
                            
                            @endif
                        @endforeach                                    
                    </div>
                </div> 
            </div> 
        </div>
    </section>                   
    @else
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">            
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active"><h3>Sản phẩm nổi bật</h3></li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">    
                        @foreach ($featuredProducts as $product)
                            @if ($product->category_id == $category->id)                        
                        
                                @include('front.components.product-item')

                            @endif
                        @endforeach
                                    
                    </div>
                </div> 
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="{{asset($category->image)}}">
                        <h2>{{$category->name}}</h2>
                        <a href="{{url('shop/category/'.$category->name.'')}}">Xem thêm</a>
                    </div>
                </div> 
            </div> 
        </div>
    </section>    
    @endif
    @endforeach  
    <!-- {{-- Featured Banner Section End  --}} -->


    <!-- {{-- Latest Blog Section Begin  --}} -->
    <section class="latest-blog spad">
        <div class="container">
        </div>
            <div class="container">
                <div class="benefit-items">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="single-benefit">
                                <div class="sb-icon">
                                    <img src="front/img/icon-1.png" alt="">
                                </div>
                                <div class="sb-text">
                                    <h6>Free Ship</h6>
                                    <p>Tất cả các đơn hàng từ 1.000.000 VND</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single-benefit">
                                <div class="sb-icon">
                                    <img src="front/img/icon-2.png" alt="">
                                </div>
                                <div class="sb-text">
                                    <h6>Giao hàng đúng hạn</h6>
                                    <p>Nếu không có vấn đề gì</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single-benefit">
                                <div class="sb-icon">
                                    <img src="front/img/icon-3.png" alt="">
                                </div>
                                <div class="sb-text">
                                    <h6>Thanh toán nhanh</h6>
                                    <p>100% An toàn</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </section>
    <!-- {{-- Latest Blog Section End  --}} -->
@endsection
   