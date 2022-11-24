@extends('front.layout.master')

@section('title','Liên hệ')

@section('body')
<!-- {{-- Breadcrumb Section Begin --}} -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{route('index')}}"><i class="fa fa-home"></i>Trang chủ</a>
                    <span>Liên hệ</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- {{-- Breadcrumb Section End --}} -->

<!-- Introduce Section Begin -->
<section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-pic">
                            <img class="product-big-img" src="front/img/contact1.jpg" alt="" >
                        </div> 
                    </div>
                </div>
               
            </div>
            <div class="col-lg-3">
                <div class="filter-widget" style="border: 2px solid grey; text-align: center; padding:30px 0px; height: 350px;">
                    <h4 class="fw-title">Thông tin liên hệ</h4>
                    <ul>
                        <li>1A Yết Kiêu - Hà Nội</li>
                        <li>SĐT: +84 98.51.88.688</li>
                        <li>Email: nhommanguonmo@gamil.com</li>
                    </ul>
                    <div class="footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>  
            </div>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="register-form" >
                            <h4 class="fw-title" style="padding: 40px 0px"><b>Gửi lời nhắn</b></h4>
                            <form action="" method="">
                                <div class="group-input">
                                    <input type="text" id="name" name="name" placeholder="Nhập vào họ tên" style="background-color: rgb(203, 251, 203)">
                                </div>
                                <div class="group-input">
                                    <input type="email" id="email" name="email" placeholder="Nhập vào địa chỉ email" style="background-color: rgb(203, 251, 203)">
                                </div>
                                <div class="group-input">
                                    {{-- <label for="content">Nội dung</label> --}}
                                    {{-- <textarea type="text" id="content" placeholder="Nhập nội dung"  name="content" rows="9" cols="70" 
                                    style="border: 1px solid #ebebeb; width: 100%;background-color: rgb(203, 251, 203)">  
                                    </textarea>   --}}
                                    <textarea rows="9" cols="70" placeholder="Nhập nội dung..."  style="border: 1px solid #ebebeb; width: 100%;background-color: rgb(203, 251, 203); padding: 20px"></textarea>
                                </div>
                                <button type="submit" class="site-btn">Gửi đi</button>
                            </form>
                        </div> 
                    </div>
                </div>
               
            </div>
            <div class="col-lg-3">
                <div class="filter-widget" >
                    <h4 class="fw-title" style="padding: 25px 0px">Liên hệ trực tiếp</h4>
                    <h4>Phòng kinh doanh</h4>
                    <p>Tư vấn - đặt hàng</p>
                    <br>
                    <p>SDT: 0932 092 002</p>
                    <p>Email: info@123website.com.vn</p>
                    <br>
                    <br>
                    <h4>Phòng Kỹ thuật</h4>
                    <p>Hỗ trợ - hướng dẫn</p>
                    <br>
                    <p>SDT: 0932 092 002</p>
                    <p>Email: hotro@123website.com.vn</p>
                    
                </div>  
            </div>
        </div>


    </div>
</section>
<!-- Introduce Section End  -->


@endsection
