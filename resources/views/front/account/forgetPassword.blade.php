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
                <div class="login-form">
                    <h2>Đặt lại mật khẩu</h2>

                    {{-- @if(session('Thông báo'))
                        <div class="alert alert-warning" role="alert">
                            {{session('Thông báo')}}
                        </div>
                    @endif --}}
                    @include('admin.alert')

                    <form action="#" method="post">
                        @csrf
                        <div class="group-input">
                            <label for="email">Địa chỉ email <span style="color: red">*</span></label>
                            <input type="email" id="email" name="email" required autocomplete="email">
                        </div>
                        <button type="submit" class="site-btn login-btn">Gửi liên kết đặt lại mật khẩu</button>
                    </form>
                    {{-- <div class="switch-login">
                        <a href="{{url('account/register')}}" class="or-login">Tạo tài khoản</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Section End-->

@endsection

