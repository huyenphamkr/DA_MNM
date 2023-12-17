<form action="shop">
    <div class="filter-widget">
        <h4 class="fw-title">Danh mục sản phẩm</h4>
        <ul class="filter-catagories">

            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(url('shop/category/'.$category->name.'')); ?>"><?php echo e($category->name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>
    </div>
</form><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/front/shop/components/products-sidebar-filter.blade.php ENDPATH**/ ?>