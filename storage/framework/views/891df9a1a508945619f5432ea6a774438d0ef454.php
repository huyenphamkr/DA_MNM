

<?php $__env->startSection('title','Chi tiết sản phẩm'); ?>

<?php $__env->startSection('body'); ?>
<!--  -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?php echo e(route('index')); ?>"><i class="fa fa-home"></i>Trang chủ</a>
                    <a href="<?php echo e(route('shop')); ?>">Sản phẩm</a>
                    <span>Chi tiết sản phẩm</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php echo $__env->make('front.shop.components.products-sidebar-filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-pic-zoom">
                            <img class="product-big-img" src="<?php echo e(asset($product->image)); ?>" alt="<?php echo e($product->name); ?>">
                            <div class="zoom-icon">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div> 
                         <div class="product-thumbs"> 
                            <div class="product-thumbs-track ps-slider owl-carousel">
                                <div class="pt active" data-imgbigurl="<?php echo e(asset($product->image)); ?>">
                                    <img src="<?php echo e(asset($product->image)); ?>" alt="">
                                </div>   
                            </div>
                         </div>  
                    </div>
                   
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd title">
                                <h3><?php echo e($product->name); ?></h3>
                                <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                            </div>
                            <div class="pd-desc">
                                <p><?php echo $product->description; ?></p>
                                <h4><?php echo e(number_format($product->price, 0, ',', '.')); ?> VND</h4>  
                            </div>
                            <div class="quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                    
                                    <a href="javascript:AddCart(<?php echo e($product->id); ?>)" class="primary-btn pd-cart">Thêm vào giỏ</a>
                                </div>
                            </div>
                            <ul class="pd-tags">
                                <li><span>Danh mục: </span><?php echo e($product->category->name); ?></li>
                            </ul>
                            <div class="pd-share">
                                <div class="p-code">
                                    Mã : <?php echo e($product->id); ?>

                                </div>
                                <div class="pd-social">
                                    <a href="#"><i class="ti-facebook"></i></a>
                                    <a href="#"><i class="ti-twitter-alt"></i></a>
                                    <a href="#"><i class="ti-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
<!-- Product Shop Section End  -->

<!-- Related Products Section Begin  -->
<div class="ralated-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>SẢN PHẨM LIÊN QUAN</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-sm-6">
                    
                    <?php echo $__env->make('front.components.product-item-related', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
        </div>
    </div>
</div>
<!-- Related Products Section End  -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/front/shop/show.blade.php ENDPATH**/ ?>