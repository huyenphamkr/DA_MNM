@extends('front.layout.master')

@section('title','Đăng ký tài khoản')

@section('body')

<!-- {{-- Breadcrumb Section Begin --}} -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{route('index')}}"><i class="fa fa-home"></i>Trang chủ</a>
                    <a href="{{url('account/login')}}">Đăng nhập</a>
                    <span>Đặt lại mật khẩu</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- {{-- Breadcrumb Section End --}} -->


<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>Đặt lại mật khẩu</h2>
                    {{-- Hiện thông báo --}}

                    {{-- @if(session('Thông báo'))
                        <div class="alert alert-warning" role="alert">
                            {{session('Thông báo')}}
                        </div>
                    @endif --}}
                    @include('admin.alert')

                    <form action="" method="post">
                        @csrf
                        
                        <div class="group-input">
                            <label for="pass">Mật khẩu <span style="color: red">*</span></label>
                            <input type="password" id="pass" name="password" required autocomplete="password">
                        </div>
                        <div class="group-input">
                            <label for="con-pass">Nhập lại mật khẩu <span style="color: red">*</span></label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="password_confirmation">
                        </div>
                        <button type="submit" class="site-btn register-btn">Đặt lại mật khẩu</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Section End-->
@endsection
