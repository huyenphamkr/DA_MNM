

<?php $__env->startSection('title','Đăng nhập'); ?>

<?php $__env->startSection('body'); ?>

<!--  -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?php echo e(route('index')); ?>"><i class="fa fa-home"></i>Trang chủ</a>
                    <span>Đăng nhập</span>
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
                <div class="login-form">
                    <h2>Đăng nhập</h2>

                    
                    
                    <?php if(Session::has('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo Session::get('error'); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(Session::has('success')): ?>
                        <div class="alert alert-success">
                            <?php echo Session::get('success'); ?>

                        </div>
                    <?php endif; ?>

                    <form action="#" method="post">
                        <?php echo csrf_field(); ?>
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
                                <a href="<?php echo e(url('account/forget')); ?>" class="forget-pass">Quên mật khẩu ?</a>
                            </div>
                        </div>
                        <button type="submit" class="site-btn login-btn">Đăng nhập</button>
                    </form>
                    <div class="switch-login">
                        <a href="<?php echo e(url('account/register')); ?>" class="or-login">Tạo tài khoản</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Section End-->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/front/account/login.blade.php ENDPATH**/ ?>