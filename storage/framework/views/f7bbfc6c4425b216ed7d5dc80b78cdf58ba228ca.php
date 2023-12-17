

<?php $__env->startSection('title', 'Kết quả đặt hàng'); ?>

<?php $__env->startSection('body'); ?>

<!-- Section Begin -->
<section class="checkout-section spad">
    <div class="container">
        
        <div class="row">        
            <div class="col-lg-12">
                <h4>
                    <?php echo e($notification); ?>

                </h4> 
                
                <a href="<?php echo e(route('shop')); ?>" class="primary-btn mt-5">Tiếp tục mua sắm</a>
            </div>                
        </div>
           
    </div>
</section>

<!--  Section End -->

<?php $__env->stopSection(); ?>



<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/front/checkout/result.blade.php ENDPATH**/ ?>