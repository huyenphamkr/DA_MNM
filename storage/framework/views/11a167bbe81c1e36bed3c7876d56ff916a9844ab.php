<div class="product-item item">        
    <div class="pi-pic">
        <img src="<?php echo e(asset($product->image)); ?>" alt="<?php echo e($product->name); ?>" style="height:250px">
                    
                    
        <div class="icon">
            <i class="icon_heart_alt"></i>
        </div>
        <ul>
            
            <li class="w-icon active"><a href="javascript:AddCart(<?php echo e($product->id); ?>)"><i class="icon_bag_alt"></i></a></li>
            <li class="quick-view"><a href="<?php echo e(url('shop/product/'.$product->id.'')); ?>">+ Xem thêm</a></li>
            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
        </ul>
    </div>
    <div class="pi-text">
        <div class="category-name"><?php echo e($product->category->name); ?></div>
        <a href="<?php echo e(url('shop/product/'.$product->id.'')); ?>">
            <h5><?php echo e($product->name); ?></h5>
        </a>
        <div class="product-price">
            <?php echo e(number_format($product->price, 0, ',', '.')); ?> VND
        </div>
    </div>
</div><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/front/components/product-item-related.blade.php ENDPATH**/ ?>