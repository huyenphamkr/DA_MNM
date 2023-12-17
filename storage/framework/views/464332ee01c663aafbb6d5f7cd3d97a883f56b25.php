

<?php $__env->startSection('title','Đăng ký tài khoản'); ?>

<?php $__env->startSection('body'); ?>

<!--  -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?php echo e(route('index')); ?>"><i class="fa fa-home"></i>Trang chủ</a>
                    <span>Đăng ký tài khoản</span>
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
                    <h2>Đăng ký tài khoản</h2>
                    

                    
                    <?php echo $__env->make('admin.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <form action="" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="group-input">
                            <label for="name">Tên <span style="color: red">*</span></label>
                            <input type="text" id="name" name="name" required autocomplete="name">
                        </div>
                        <div class="group-input">
                            <label for="email">Địa chỉ email <span style="color: red">*</span></label>
                            <input type="email" id="email" name="email" required autocomplete="email">
                        </div>
                        <div class="group-input">
                            <label for="pass">Mật khẩu <span style="color: red">*</span></label>
                            <input type="password" id="pass" name="password" required autocomplete="password">
                        </div>
                        <div class="group-input">
                            <label for="con-pass">Nhập lại mật khẩu <span style="color: red">*</span></label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="password_confirmation">
                        </div>
                        <div class="group-input">
                            <label for="address">Địa chỉ <span style="color: red">*</span></label>
                            <input required type="text" id="address" name="address" required autocomplete="address">
                        </div>
                        <div class="group-input">
                            <label for="phone">Số điện thoại <span style="color: red">*</span></label>
                            <input type="number" id="phone_number" name="phone_number" required autocomplete="phone_number">
                        </div>
                        <div class="group-input" style="display: flex">
                            <label for="sex">Giới tính <span style="color: red">*</span></label>
                            <select name="gender" id="sex" style="border:1px solid #ebebeb; margin-left: 20px; width: 100px">
                                <option value="Nam" >Nam</option>
                                <option value="Nữ" >Nữ</option>
                            </select>
                        </div>
                        <button type="submit" class="site-btn register-btn">Đăng ký</button>
                    </form>
                    <div class="switch-login">
                        <a href="<?php echo e(url('account/login')); ?>" class="or-login">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Section End-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/front/account/register.blade.php ENDPATH**/ ?>