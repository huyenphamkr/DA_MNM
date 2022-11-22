@extends('front.layout.master')

@section('title','Đăng nhập')

@section('body')

<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{route('index')}}"><i class="fa fa-home"></i>Trang chủ</a>
                    <a href="{{url('account/login')}}">Đăng nhập</a>
                    <span>Kích hoạt tài khoản</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Kích hoạt tài khoản</h2>
                    @include('admin.alert')
                    <p>Vui lòng nhập Email mà bạn đã đăng ký tài khoản trong hệ thống của chúng tôi</p>
                    <form action="#" method="post">
                        @csrf
                        <div class="group-input">
                            <label for="email">Địa chỉ email <span style="color: red">*</span></label>
                            <input type="email" id="email" name="email" required autocomplete="email">
                        </div>
                        <button type="submit" class="site-btn login-btn">Gửi email xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Section End-->

@endsection

