<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="codelean Template">
    <meta name="keywords" content="codelean, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front/css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}" type="text/css">
</head>

<body>
    <!-- Start coding here -->

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader">
        </div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class="fa fa-envelope"></i>
                        it.k19.company@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class="fa fa-phone"></i>
                        +84 98.51.88.688
                    </div>
                </div>
    
                <div class="ht-right">
                    {{-- Hi???n th??? t??n t??i kho???n k??m n??t ????ng xu???t --}}
                    @if(Auth::check())
                        <a href="{{url('account/logout')}}" class="login-panel">
                            <i class="fa fa-user"></i>
                            {{Auth::user()->name}} - ????ng xu???t
                        </a>
                    @else
                        <a href="{{url('account/login')}}" class="login-panel"> <i class="fa fa-user"></i>????ng nh???p </a>
                    @endif

                    <div class="top-social">
                        <a href="#"> <i class="ti-facebook"></i> </a>
                        <a href="#"> <i class="ti-twitter-alt"></i> </a>
                        <a href="#"> <i class="ti-linkedin"></i> </a>
                        <a href="#"> <i class="ti-pinterest"></i> </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="inner-header" style="padding: 0">
                <div class="row">
                    <div class="col-lg-3 col-md-3 ">
                        <div class="logo">
                            <a href="{{route('index')}}">
                                <img src="{{asset('front\img\furniture-logo-cricle.png')}}" height="120" width="170" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <form action="shop">
                            <div class="advanced-search">
                                <div class="input-group" style="max-width: 100%">
                                    <input name="search" value="{{request('search')}}" type="text" placeholder="Nh???p s???n ph???m, danh m???c hay t??? kh??a t??m ki???m... ">
                                    <button type="submit"> <i class="ti-search"></i> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2 col-md-2 text-right" style="text-align:center">
                        <ul class="nav-right" style="padding: 45px 0">
                            <li class="cart-icon">
                                <a href="{{route('cart')}}">
                                    <i class="icon_bag_alt"></i>
                                    <span class="cart-count">{{Cart::count()}}</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>

                                                @foreach(Cart::content() as $cart)
                                                    <tr data-rowId="{{$cart->rowId}}">
                                                        <td class="si-pic"> <img src="{{asset($cart->options->images)}}" style="height: 70px"> </td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>{{number_format($cart->price, 0, ',', '.')}} VND x {{$cart->qty}} </p>
                                                                <h6>{{$cart->name}}</h6>
                                                            </div>
                                                        </td>
                                                        {{-- xo?? s???n ph???m trong gi??? h??ng --}}
                                                        <td class="si-close">
                                                            <i onclick="removeCart('{{$cart->rowId}}')" class="ti-close"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>T???ng ti???n:</span>
                                        <h5>
                                            {{number_format(str_replace(',', '', number_format(str_replace(',', '', Cart::subtotal()))), 0, ',', '.')}} VND
                                            
                                        </h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="{{route('cart')}}" class="primary-btn view-card">Xem gi??? h??ng</a>
                                        <a href="{{url('checkout')}}" class="primary-btn checkout-btn">Thanh to??n</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price" style="font-size: 12px">
                                {{number_format(str_replace(',', '', number_format(str_replace(',', '', Cart::subtotal()))), 0, ',', '.')}} VND
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{(request()->segment(1) == '') ? 'active': '' }}"><a href="{{route('index')}}" style="padding: 16px 75px 15px">Trang ch???</a></li>
                        <li class="{{(request()->segment(1) == 'shop') ? 'active': '' }}"><a href="{{url('shop')}}" style="padding: 16px 75px 15px">S???n ph???m</a></li>
                        <li class="{{(request()->segment(1) == 'introduce') ? 'active': '' }}"><a href="{{url('introduce')}}" style="padding: 16px 75px 15px">Gi???i thi???u</a></li>
                        <li class="{{(request()->segment(1) == 'contact') ? 'active': '' }}"><a href="{{url('contact')}}" style="padding: 16px 75px 15px">Li??n H???</a></li>
                        <li><a href="" style="padding: 16px 75px 15px">Li??n quan</a>
                            <ul class="dropdown" style="width: 230px;text-align: center">
                                <li><a href="{{url('cart')}}" >Gi??? h??ng</a></li>
                                <li><a href="{{url('account/my-order/')}}">????n h??ng c???a t??i</a></li>
                                <li><a href="{{url('checkout')}}">Thanh to??n</a></li>
                                <li><a href="{{url('account/register')}}" >????ng k?? t??i kho???n</a></li>
                                <li><a href="{{url('account/login')}}">????ng nh???p</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap">

                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    {{-- Body here --}}

    @yield('body')

    <!-- {{-- Footer Section Begin --}} -->
        <footer class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-left">
                            <div class="footer-logo">
                                <a href="{{route('index')}}">
                                    <img src="{{asset('front\img\furniture-logo-980x980.jpg')}}" height="110" width="150" alt="">
                                </a>
                            </div>
                            <ul>
                                <li>273 An D????ng V????ng Ph?????ng 3 Qu???n 5 TPHCM</li>
                                <li>S??T: +84 98.51.88.688</li>
                                <li>Email: it.k19.company@gmail.com</li>
                            </ul>
                            <div class="footer-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
    
                    </div>
                    <div class="col-lg-2 offset-lg-1">
                        <div class="footer-widget">
                            <h5>Danh m???c </h5>
                            <ul>
                                <li><a href="#">Trang tr??</a></li>
                                <li><a href="#">Ph??ng Ng???</a></li>
                                <li><a href="#">Ph??ng L??m vi???c</a></li>
                                <li><a href="#">Ph??ng Kh??ch</a></li>
                                <li><a href="#">Ph??ng ??n</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-widget">
                            <h5>Li??n quan</h5>
                            <ul>
                                <li><a href="{{route('index')}}">Trang Ch???</a></li>
                                <li><a href="{{url('shop')}}">S???n ph???m</a></li>
                                <li><a href="{{route('cart')}}">Gi??? h??ng</a></li>
                                <li><a href="{{url('contact')}}">Li??n h???</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 ">
                        <div class="newslatter-item">
                            <h5>Tham gia nh???n ??u ????i ngay</h5>
                            <p>Nh???n th??ng tin c???p nh???t qua Email v??? c???a h??ng m???i nh???t c???a ch??ng t??i v?? c??c ??u ????i ?????c bi???t</p>
                            <form action="#" class="subscribe-form">
                                <input type="text" placeholder="Nh???p ?????a ch??? Email">
                                <button type="button">G???i</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-reserved">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
    
                            <div class="payment-pic">
                                <img src="{{asset('front/img/payment-method.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    
        <!-- {{-- Footer Section End --}} -->
    
        <!-- Js Plugins -->
        <script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('front/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('front/js/jquery.countdown.min.js')}}"></script>
        <script src="{{asset('front/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{asset('front/js/jquery.zoom.min.js')}}"></script>
        <script src="{{asset('front/js/jquery.dd.min.js')}}"></script>
        <script src="{{asset('front/js/jquery.slicknav.js')}}"></script>
        <script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('front/js/main.js')}}"></script>
        
    </body>
    
    </html>