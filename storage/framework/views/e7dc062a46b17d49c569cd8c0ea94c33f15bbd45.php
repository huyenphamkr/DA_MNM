

<?php $__env->startSection('title', 'Thủ tục thanh toán'); ?>

<?php $__env->startSection('body'); ?>

<!--  -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?php echo e(route('index')); ?>"><i class="fa fa-home"></i>Trang chủ</a>
                    <a href="<?php echo e(route('shop')); ?>">Sản phẩm</a>
                    <span>Thủ tục thanh toán</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->


<!-- Shopping Cart Section Begin -->
<div class="checkout-section spad">
    <div class="container">
        <form action="#" method="post" class="checkout-form">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <a href="<?php echo e(url('account/login')); ?>" class="content-btn">Nhấn vào đây để <b>đăng nhập</b></a>
                    </div>
                    <h4>Thông tin đơn hàng </h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="name">Họ và tên <span style="color: red">*</span></label>
                            <input type="text" id="name" name="name" placeholder="Nhập họ và tên" required autocomplete="name">
                        </div>
                        
                        <div class="col-lg-12">
                            <label for="address">Địa chỉ <span style="color: red">*</span> </label>
                            <input type="text" id="address" name="address" placeholder="Nhập địa chỉ" required autocomplete="address">
                        </div>
                        <div class="col-lg-12">
                            <label for="phone_number">Số điện thoại <span style="color: red">*</span> </label>
                            <input type="text" id="phone_number" name="phone_number" placeholder="Nhập số điện thoại" required autocomplete="phone_number">
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <input type="text" placeholder="Nhập mã giảm giá của bạn">
                    </div>
                    <div class="place-order">
                        <h4>Đơn hàng của bạn</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Sản phẩm <span>Tổng tiền</span></li>

                                <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="fw-normal">
                                        <?php echo e($cart->name); ?> <b>x</b> <?php echo e($cart->qty); ?>

                                        <span><?php echo e(number_format($cart->price * $cart->qty, 0, ',', '.')); ?> VND</span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                

                                <li class="fw-normal">Tạm tính<span><?php echo e(number_format(str_replace(',', '', number_format(str_replace(',', '', $subtotal))), 0, ',', '.')); ?> VND</span></li>
                                
                                <li class="total-price">Tổng tiền<span><?php echo e(number_format(str_replace(',', '', number_format(str_replace(',', '', $total))), 0, ',', '.')); ?> VND</span></li>
                            </ul>
                            <div class="payment-check">
                                <div class="pc-item">
                                    <label for="pc-check">
                                        Thanh toán khi nhận hàng
                                        <input type="radio" name="payment" value="Thanh toán khi nhận hàng" id="pc-check" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="pc-item">
                                    <label for="pc-paypal">
                                        Thanh toán online
                                        <input type="radio" name="payment" value="Thanh toán online" id="pc-paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="order-btn">
                                <button type="submit" class="site-btn place-btn">Thanh toán</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</div>

<!-- Shopping Cart Section End -->

<?php $__env->stopSection(); ?>



<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/front/checkout/index.blade.php ENDPATH**/ ?>