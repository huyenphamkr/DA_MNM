

<?php $__env->startSection('title','Đăng ký tài khoản'); ?>

<?php $__env->startSection('body'); ?>

<!--  -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?php echo e(route('index')); ?>"><i class="fa fa-home"></i>Trang chủ</a>
                    <a href="<?php echo e(url('account/login')); ?>">Đăng nhập</a>
                    <span>Đặt lại mật khẩu</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->


<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>Đặt lại mật khẩu</h2>
                    

                    
                    <?php echo $__env->make('admin.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <form action="" method="post">
                        <?php echo csrf_field(); ?>
                        
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/front/account/resetPassword.blade.php ENDPATH**/ ?>