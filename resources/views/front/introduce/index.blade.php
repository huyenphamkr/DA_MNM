@extends('front.layout.master')

@section('title','Giới thiệu')

@section('body')
<!-- {{-- Breadcrumb Section Begin --}} -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{route('index')}}"><i class="fa fa-home"></i>Trang chủ</a>
                    <span>Giới thiệu</span>
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
            <div class="col-lg-3">
                <div class="filter-widget" style="border: 2px solid rgb(0, 149, 255); text-align: center; padding: 10px">
                    <h4 class="fw-title">Thông tin cửa hàng</h4>
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
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-pic">
                            <img class="product-big-img" src="front/img/contact.png" alt="">
                        </div> 
                    </div>
                    <div class="col-lg-12" style="margin: 20px 0px">
                        <div class="contact">
                            <div class="fw-title">
                                <h3 style="color: black">Giới thiệu</h3>
                            </div>
                            <div class="pd-desc" style="color: black; padding: 15px 0px">
                                <h4>Lịch sử phát triển của cửa hàng nội thất <b>FURNITURE</b></h4>  
                            </div>
                            <div class="pd-share">
                                <p>Trong những năm vừa qua công ty <b>FURNITURE</b> được khách hàng biết đến là một thương hiệu 
                                    nội thất uy tín và chất lượng. Chúng tôi tự hào là nơi mang đến cho người tiêu dùng 
                                    những sản phẩm nội thất, bền và đẹp. Để nối tiếp những thành công vang dội đó, công 
                                    ty chúng tôi tiếp tục mở rộng và phát triển thương hiệu FURNITURE riêng cho mình</p>
                            </div>
                            <div class="pd-desc" style="color: black; padding: 15px 0px">
                                <h4>Giới thiệu cửa hàng nội thất <b>FURNITURE</b></h4>  
                            </div>
                            <div class="pd-share">
                                <p><b>Showroom FURNITURE</b> giới thiệu hàng loạt các sản phẩm với thiết kế theo xu hướng 
                                    mới nhất trên thị trường nội thất hiện nay với kiểu dáng tinh tế, hiện đại, mang tính 
                                    thẩm mỹ cao như: bàn ghế sofa, bàn ăn, giường ngủ bọc da, thảm trang trí, đèn trang trí, 
                                    giấy dán tường, tranh treo tường, hoa và những phụ kiện trang trí…</p>
                            </div> 
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="row">
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
    </div>
    </section>
<!-- Introduce Section End  -->


@endsection
