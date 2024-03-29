<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="codelean Template">
    <meta name="keywords" content="codelean, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('front/css/bootstrap.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('front/css/font-awesome.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('front/css/themify-icons.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('front/css/elegant-icons.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('front/css/owl.carousel.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('front/css/nice-select.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('front/css/jquery-ui.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('front/css/slicknav.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('front/css/style.css')); ?>" type="text/css">
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
                    
                    <?php if(Auth::check()): ?>
                        <a href="<?php echo e(url('account/logout')); ?>" class="login-panel">
                            <i class="fa fa-user"></i>
                            <?php echo e(Auth::user()->name); ?> - Đăng xuất
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(url('account/login')); ?>" class="login-panel"> <i class="fa fa-user"></i>Đăng nhập </a>
                    <?php endif; ?>

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
                            <a href="<?php echo e(route('index')); ?>">
                                <img src="<?php echo e(asset('front\img\furniture-logo-cricle.png')); ?>" height="120" width="170" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <form action="shop">
                            <div class="advanced-search">
                                <div class="input-group" style="max-width: 100%">
                                    <input name="search" value="<?php echo e(request('search')); ?>" type="text" placeholder="Nhập sản phẩm, danh mục hay từ khóa tìm kiếm... ">
                                    <button type="submit"> <i class="ti-search"></i> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2 col-md-2 text-right" style="text-align:center">
                        <ul class="nav-right" style="padding: 45px 0">
                            <li class="cart-icon">
                                <a href="<?php echo e(route('cart')); ?>">
                                    <i class="icon_bag_alt"></i>
                                    <span class="cart-count"><?php echo e(Cart::count()); ?></span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>

                                                <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr data-rowId="<?php echo e($cart->rowId); ?>">
                                                        <td class="si-pic"> <img src="<?php echo e(asset($cart->options->images)); ?>" style="height: 70px"> </td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p><?php echo e(number_format($cart->price, 0, ',', '.')); ?> VND x <?php echo e($cart->qty); ?> </p>
                                                                <h6><?php echo e($cart->name); ?></h6>
                                                            </div>
                                                        </td>
                                                        
                                                        <td class="si-close">
                                                            <i onclick="removeCart('<?php echo e($cart->rowId); ?>')" class="ti-close"></i>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>Tổng tiền:</span>
                                        <h5>
                                            <?php echo e(number_format(str_replace(',', '', number_format(str_replace(',', '', Cart::subtotal()))), 0, ',', '.')); ?> VND
                                            
                                        </h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="<?php echo e(route('cart')); ?>" class="primary-btn view-card">Xem giỏ hàng</a>
                                        <a href="<?php echo e(url('checkout')); ?>" class="primary-btn checkout-btn">Thanh toán</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price" style="font-size: 12px">
                                <?php echo e(number_format(str_replace(',', '', number_format(str_replace(',', '', Cart::subtotal()))), 0, ',', '.')); ?> VND
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
                        <li class="<?php echo e((request()->segment(1) == '') ? 'active': ''); ?>"><a href="<?php echo e(route('index')); ?>" style="padding: 16px 75px 15px">Trang chủ</a></li>
                        <li class="<?php echo e((request()->segment(1) == 'shop') ? 'active': ''); ?>"><a href="<?php echo e(url('shop')); ?>" style="padding: 16px 75px 15px">Sản phẩm</a></li>
                        <li class="<?php echo e((request()->segment(1) == 'introduce') ? 'active': ''); ?>"><a href="<?php echo e(url('introduce')); ?>" style="padding: 16px 75px 15px">Giới thiệu</a></li>
                        <li class="<?php echo e((request()->segment(1) == 'contact') ? 'active': ''); ?>"><a href="<?php echo e(url('contact')); ?>" style="padding: 16px 75px 15px">Liên Hệ</a></li>
                        <li><a href="" style="padding: 16px 75px 15px">Liên quan</a>
                            <ul class="dropdown" style="width: 230px;text-align: center">
                                <li><a href="<?php echo e(url('cart')); ?>" >Giỏ hàng</a></li>
                                <li><a href="<?php echo e(url('account/my-order/')); ?>">Đơn hàng của tôi</a></li>
                                <li><a href="<?php echo e(url('checkout')); ?>">Thanh toán</a></li>
                                <li><a href="<?php echo e(url('account/register')); ?>" >Đăng ký tài khoản</a></li>
                                <li><a href="<?php echo e(url('account/login')); ?>">Đăng nhập</a></li>
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

    

    <?php echo $__env->yieldContent('body'); ?>

    <!--  -->
        <footer class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-left">
                            <div class="footer-logo">
                                <a href="<?php echo e(route('index')); ?>">
                                    <img src="<?php echo e(asset('front\img\furniture-logo-980x980.jpg')); ?>" height="110" width="150" alt="">
                                </a>
                            </div>
                            <ul>
                                <li>273 An Dương Vương Phường 3 Quận 5 TPHCM</li>
                                <li>SĐT: +84 98.51.88.688</li>
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
                            <h5>Danh mục </h5>
                            <ul>
                                <li><a href="#">Trang trí</a></li>
                                <li><a href="#">Phòng Ngủ</a></li>
                                <li><a href="#">Phòng Làm việc</a></li>
                                <li><a href="#">Phòng Khách</a></li>
                                <li><a href="#">Phòng Ăn</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-widget">
                            <h5>Liên quan</h5>
                            <ul>
                                <li><a href="<?php echo e(route('index')); ?>">Trang Chủ</a></li>
                                <li><a href="<?php echo e(url('shop')); ?>">Sản phẩm</a></li>
                                <li><a href="<?php echo e(route('cart')); ?>">Giỏ hàng</a></li>
                                <li><a href="<?php echo e(url('contact')); ?>">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 ">
                        <div class="newslatter-item">
                            <h5>Tham gia nhận ưu đãi ngay</h5>
                            <p>Nhận thông tin cập nhật qua Email về cửa hàng mới nhất của chúng tôi và các ưu đãi đặc biệt</p>
                            <form action="#" class="subscribe-form">
                                <input type="text" placeholder="Nhập địa chỉ Email">
                                <button type="button">Gửi</button>
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
                                <img src="<?php echo e(asset('front/img/payment-method.png')); ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    
        <!--  -->
    
        <!-- Js Plugins -->
        <script src="<?php echo e(asset('front/js/jquery-3.3.1.min.js')); ?>"></script>
        <script src="<?php echo e(asset('front/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('front/js/jquery-ui.min.js')); ?>"></script>
        <script src="<?php echo e(asset('front/js/jquery.countdown.min.js')); ?>"></script>
        <script src="<?php echo e(asset('front/js/jquery.nice-select.min.js')); ?>"></script>
        <script src="<?php echo e(asset('front/js/jquery.zoom.min.js')); ?>"></script>
        <script src="<?php echo e(asset('front/js/jquery.dd.min.js')); ?>"></script>
        <script src="<?php echo e(asset('front/js/jquery.slicknav.js')); ?>"></script>
        <script src="<?php echo e(asset('front/js/owl.carousel.min.js')); ?>"></script>
        <script src="<?php echo e(asset('front/js/main.js')); ?>"></script>
        
    </body>
    
    </html><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/front/layout/master.blade.php ENDPATH**/ ?>