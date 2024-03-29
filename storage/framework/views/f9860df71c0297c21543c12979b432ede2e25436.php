

<?php $__env->startSection('title','Sản phẩm'); ?>

<?php $__env->startSection('body'); ?>
 <!--  -->
 <div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?php echo e(route('index')); ?>"><i class="fa fa-home"></i>Trang chủ</a>
                    <span>Sản phẩm</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->


<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 product-sidebar-filter">
                
               <?php echo $__env->make('front.shop.components.products-sidebar-filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
               <div class="product-show-option">
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <form action="">
                            <div class="select-option">
                            <select name="sort_by" onchange="this.form.submit();" class="sorting">
                                
                                <option <?php echo e(request('sort_by') == 'latest' ? 'selected': ''); ?> value="latest">Sắp xếp: Mới nhất</option>
                                <option <?php echo e(request('sort_by') == 'oldest' ? 'selected': ''); ?> value="oldest">Sắp xếp: Cũ nhất</option>
                                <option <?php echo e(request('sort_by') == 'name-ascending' ? 'selected': ''); ?> value="name-ascending">Sắp xếp: Tên A-Z</option>
                                <option <?php echo e(request('sort_by') == 'name-descending' ? 'selected': ''); ?> value="name-descending">Sắp xếp: Tên Z-A</option>
                                <option <?php echo e(request('sort_by') == 'price-ascending' ? 'selected': ''); ?> value="price-ascending">Sắp xếp: Giá tăng dần</option>
                                <option <?php echo e(request('sort_by') == 'price-descending' ? 'selected': ''); ?> value="price-descending">Sắp xếp: Giá giảm dần</option>
                            </select>
                            
                            <select name="show" onchange="this.form.submit();" class="p-show">
                                <option <?php echo e(request('show') == '3' ? 'selected' : ''); ?> value="3">Hiển thị: 3</option>
                                <option <?php echo e(request('show') == '9' ? 'selected' : ''); ?> value="9">Hiển thị: 9</option>
                                <option <?php echo e(request('show') == '15' ? 'selected' : ''); ?> value="15">Hiển thị: 15</option>
                            </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5 col-md-5 text-right">
                    </div>
                </div>
               </div>
               <div class="product-list">
                <div class="row">

                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-sm-6">
                            
                            <?php echo $__env->make('front.components.product-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </div>
               </div>
               
               <?php echo e($products->links()); ?>

            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/front/shop/index.blade.php ENDPATH**/ ?>