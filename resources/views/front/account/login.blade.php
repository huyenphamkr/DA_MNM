@extends('front.layout.master')

@section('title','Đăng nhập')

@section('body')

<!-- {{-- Breadcrumb Section Begin --}} -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{route('index')}}"><i class="fa fa-home"></i>Trang chủ</a>
                    <span>Đăng nhập</span>
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
                <div class="login-form">
                    <h2>Đăng nhập</h2>

                    {{-- @if(session('Thông báo'))
                        <div class="alert alert-warning" role="alert">
                            {{session('Thông báo')}}
                        </div>
                    @endif --}}
                    {{-- @include('admin.alert') --}}
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {!!Session::get('error')!!}
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {!!Session::get('success')!!}
                        </div>
                    @endif

                    <form action="#" method="post">
                        @csrf
                        <div class="group-input">
                            <label for="email">Địa chỉ email <span style="color: red">*</span></label>
                            <input type="email" id="email" name="email" required autocomplete="email">
                        </div>
                        <div class="group-input">
                            <label for="pass">Mật khẩu <span style="color: red">*</span></label>
                            <input type="password" id="pass" name="password" required autocomplete="password">
                        </div>
                        <div class="group-input gi-check">
                            <div class="gi-more">
                                <label for="save-pass">
                                   Lưu mật khẩu
                                    <input type="checkbox" id="save-pass" name="remember">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="{{url('account/forget')}}" class="forget-pass">Quên mật khẩu ?</a>
                            </div>
                        </div>
                        <button type="submit" class="site-btn login-btn">Đăng nhập</button>
                    </form>
                    <div class="switch-login">
                        <a href="{{url('account/register')}}" class="or-login">Tạo tài khoản</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Section End-->

@endsection

