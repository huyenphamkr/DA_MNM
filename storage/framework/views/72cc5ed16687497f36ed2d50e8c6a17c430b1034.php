

<?php $__env->startSection('title','Trang chủ'); ?>

<?php $__env->startSection('body'); ?>

    <!--  -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="single-hero-items set-bg" data-setbg="<?php echo e(asset($slide->image)); ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5">
                                
                                <h2 style="color: #bd7e09"> <b><?php echo e($slide->name); ?></b></h2>
                                <p style="color: black"><?php echo $slide->description; ?></p>
                                <a href="<?php echo e(route('shop')); ?>" class="primary-btn">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
    <!--  -->

    <!--  -->
    <div class="partner-logo" style="background-color: cornsilk">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="logo-item" >
                    <div class="single-banner">
                        <img src="<?php echo e(asset($category->image)); ?>" alt="" style="height: 150px" >
                        <div class="inner-text">
                            <a href="<?php echo e(url('shop/category/'.$category->name.'')); ?>"><h4 style="padding: 11px 2px"><?php echo e($category->name); ?></h4></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    
    <!--  -->


    <!--  -->
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($category->id % 2 != 0): ?>
    <section class="women-banner spad" style="padding-top: 10px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="<?php echo e($category->image); ?>">
                        <h2><?php echo e($category->name); ?></h2>
                        <a href="<?php echo e(url('shop/category/'.$category->name.'')); ?>">Xem thêm</a>
                    </div>
                </div> 
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active"><h3>Sản phẩm nổi bật</h3></li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">    
                        <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($product->category_id == $category->id): ?>                        

                                <?php echo $__env->make('front.components.product-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                    
                    </div>
                </div> 
            </div> 
        </div>
    </section>                   
    <?php else: ?>
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">            
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active"><h3>Sản phẩm nổi bật</h3></li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">    
                        <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($product->category_id == $category->id): ?>                        
                        
                                <?php echo $__env->make('front.components.product-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                    </div>
                </div> 
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="<?php echo e(asset($category->image)); ?>">
                        <h2><?php echo e($category->name); ?></h2>
                        <a href="<?php echo e(url('shop/category/'.$category->name.'')); ?>">Xem thêm</a>
                    </div>
                </div> 
            </div> 
        </div>
    </section>    
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
    <!--  -->


    <!--  -->
    <section class="latest-blog spad">
        <div class="container">
        </div>
            <div class="container">
                <div class="benefit-items">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="single-benefit">
                                <div class="sb-icon">
                                    <img src="front/img/icon-1.png" alt="">
                                </div>
                                <div class="sb-text">
                                    <h6>Free Ship</h6>
                                    <p>Tất cả các đơn hàng từ 1.000.000 VND</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single-benefit">
                                <div class="sb-icon">
                                    <img src="front/img/icon-2.png" alt="">
                                </div>
                                <div class="sb-text">
                                    <h6>Giao hàng đúng hạn</h6>
                                    <p>Nếu không có vấn đề gì</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single-benefit">
                                <div class="sb-icon">
                                    <img src="front/img/icon-3.png" alt="">
                                </div>
                                <div class="sb-text">
                                    <h6>Thanh toán nhanh</h6>
                                    <p>100% An toàn</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </section>
    <!--  -->
<?php $__env->stopSection(); ?>
   
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/front/index.blade.php ENDPATH**/ ?>