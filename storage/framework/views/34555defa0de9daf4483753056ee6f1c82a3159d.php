

<?php $__env->startSection('title','Giỏ hàng'); ?>

<?php $__env->startSection('body'); ?>
<!--  -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?php echo e(route('index')); ?>"><i class="fa fa-home"></i>Trang chủ</a>
                    <a href="<?php echo e(route('shop')); ?>">Sản phẩm</a>
                    <span>Giỏ hàng</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->


<!-- Shopping Cart section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">

            <?php if(Cart::count()>0): ?>
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th class="p-name">Tên sản phẩm</th>
                                    <th>Giá tiền</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    
                                    <th>
                                        <i onclick="confirm('Bạn có chắc chắn xóa tất cả các sản phẩm trong giỏ hàng?') === true ?  destroyCart() : '' " 
                                        style="cursor: pointer" class="ti-close"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>                            
                            <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-rowid="<?php echo e($cart->rowId); ?>">
                                    <td class="cart-pic first-row"><img src="<?php echo e(asset($cart->options->images)); ?>" alt="" style="height: 170px;"></td>
                                    <td class="cart-title first-row">
                                        <h5><?php echo e($cart->name); ?></h5>
                                    </td>
                                    <td class="p-price first-row"><?php echo e(number_format($cart->price, 0, ',', '.')); ?> VND</td>
                                    <td class="qua-col first-row">
                                        
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="<?php echo e($cart->qty); ?>" data-rowid="<?php echo e($cart->rowId); ?>">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row"><?php echo e(number_format(($cart->price * $cart->qty),0,',','.')); ?> VND</td>
                                    <td class="close-td first-row">
                                        <i onclick="removeCart('<?php echo e($cart->rowId); ?>')" class="ti-close"></i>
                                    </td>
                                    
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    

                            </tbody>
                        </table>
                    </div>
                    <div class="row" style="padding-bottom: 50px">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="<?php echo e(route('shop')); ?>" class="primary-btn continue-shop" style="background-color: #e7ab3c; color: black">Tiếp tục mua sắm</a>
                                <a href="#" class="primary-btn up-cart">Cập nhật giỏ hàng</a>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                
                                    <li class="subtotal">Tạm tính <span><?php echo e(number_format(str_replace(',', '', number_format(str_replace(',', '', $subtotal))), 0, ',', '.')); ?> VND</span></li>
                                    <li class="cart-total">Tổng tiền <span><?php echo e(number_format(str_replace(',', '', number_format(str_replace(',', '', $subtotal))), 0, ',', '.')); ?> VND</span></li>
                                </ul>
                                <a href="<?php echo e(route('checkout')); ?>" class="proceed-btn">Đặt hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-lg-12">
                    <h5 style="text-align: center">Giỏ hàng của bạn đang rỗng.</h5>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>
<!-- Shopping Cart section End -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/front/shop/cart.blade.php ENDPATH**/ ?>