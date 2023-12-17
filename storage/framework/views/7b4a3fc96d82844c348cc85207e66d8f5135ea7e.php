

<?php $__env->startSection('title', 'Chi tiết đơn hàng'); ?>

<?php $__env->startSection('body'); ?>

<!--  -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="./"><i class="fa fa-home"></i>Trang chủ</a>
                    <a href="my-order">Đơn hàng của tôi</a>
                    <span>Chi tiết đơn hàng</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->


<!-- My Order Section Begin -->
<div class="checkout-section spad">
    <div class="container">
        <form action="" class="checkout-form">
            <div class="row">
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <a href="#" class="content-btn">
                            Mã đơn hàng: <?php echo e($order->id); ?>

                        </a>
                    </div>
                    <h4>Chi tiết đơn hàng </h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="name">Họ và tên </label>
                            <input type="text" id="name" name="name" value="<?php echo e($user->name); ?>">
                        </div>
                        <div class="col-lg-12">
                            <label for="email">Địa chỉ email </label>
                            <input type="text" id="email" name="email" value="<?php echo e($user->email); ?>">
                        </div>
                        <div class="col-lg-12">
                            <label for="address">Địa chỉ nhà </label>
                            <input type="text" id="address" name="address" value="<?php echo e($user->address); ?>">
                        </div>
                        <div class="col-lg-12">
                            <label for="phone_number">Số điện thoại </label>
                            <input type="text" id="phone_number" name="phone_number" value="<?php echo e($user->phone_number); ?>">
                        </div>
                        
                    </div>
                </div>
              
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <a href="" class="content-btn">
                            Trạng thái đơn hàng: <b><?php echo e($order->status->name); ?></b>
                        </a>
                    </div>
                    <div class="place-order">
                        <h4>Đơn hàng của bạn</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Sản phẩm <span>Tổng tiền</span></li>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                        <li class="fw-normal" style="display:flex">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <img src="<?php echo e(asset($product->image)); ?>" alt="<?php echo e($product->name); ?>" >
                                                </div>
                                                <div class="col-lg-6">
                                                    <?php echo e($product->name); ?> <b>x</b> <?php echo e($product->pivot->quantity); ?>

                                                </div>
                                                <div class="col-lg-4">
                                                    <span><?php echo e(number_format($product->pivot->price*$product->pivot->quantity, 0, ',', '.')); ?> VND</span>
                                                </div>
                                            </div>                                          
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                <li>Tổng tiền <span><?php echo e(number_format($order->total, 0, ',', '.')); ?> VND</span></li>
                                <li>Ngày đặt <span><?php echo e($order->date); ?></span></li>
                            </ul> 
                            <div class="payment-check">
                                <div class="pc-item">
                                       <b>Phương thức thanh toán:</b> <?php echo e($order->payment); ?>

                                </div>
                            </div>
                               <?php if($order->status_id == 1): ?>
                                <div class="order-btn">
                                   <a class="site-btn place-btn" href="<?php echo e(url('account/my-order/delete/'.$order->id.'')); ?>">Hủy đơn hàng</a>
                                </div>
                               <?php endif; ?>                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</div>

<!-- My Order Section End -->

<?php $__env->stopSection(); ?>



<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/front/account/my-order/show.blade.php ENDPATH**/ ?>