

<?php $__env->startSection('title','Đơn hàng của tôi'); ?>

<?php $__env->startSection('body'); ?>

<!--  -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="<?php echo e(route('index')); ?>"><i class="fa fa-home"></i>Trang chủ</a>
                    <span>Đơn hàng của tôi</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->


<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <?php if(count($orderListUser) == 0): ?>                            
                    <h4 style="margin: 0 auto">
                        <?php echo e("Bạn chưa đặt đơn hàng nào cả. Không có đơn hàng"); ?>                                    
                    </h4>         <br>                   
                <?php endif; ?>

                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã đơn hàng</th>
                                <th>Hình ảnh</th>                              
                                <th class="p-name">Tên sản phẩm</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $key=1;
                            $stt = 1
                            ?>
                            
                            <?php $__currentLoopData = $orderListUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           
                           
                             <?php $orderPro = $orders->where('id','=',$orders->id)->with('products')->get();?>
                        
                             <?php $__currentLoopData = $orderPro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <?php $key++;?>
                                <tr>                                    
                                    <td class="first-row" style="text-align: center">
                                        <?php echo e($stt++); ?>

                                        
                                    </td>

                                    <td class="first-row">
                                        <?php echo e($orders->id); ?>

                                    </td>

                                    <td class="cart-pic first-row "style="text-align: center">
                                        <img src="<?php echo e(asset($product->image)); ?>" alt="<?php echo e($product->name); ?>" style="height: 100px;margin: 0 auto;">
                                    </td>
                                  
                                    <td class="cart-title first-row">
                                        <h5>                                        
                                            <?php echo e($product->name); ?>                                            
                                            <?php if(count($order->orderDetails)>1): ?>
                                                và <?php echo e(count($order->orderDetails)-1); ?> sản phẩm khác
                                            <?php endif; ?>                                            
                                        </h5>
                                    </td>
                                        <?php if($key == 2): ?>
                                            <?php break; ?>;
                                        <?php endif; ?>                                   
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key == 2): ?>
                                <?php $key=1;?>
                                    <?php break; ?>;
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="total-price first-row">
                                        <?php echo e(number_format($orders->total, 0, ',', '.')); ?>VND
                                    </td>
                                    <?php if($order->status_id == 6): ?>
                                    
                                        <?php $color = "red"?>
                                    
                                    <?php else: ?>
                                    
                                        <?php if($order->status_id == 1): ?>
                                            <?php $color = "blue"?>
                                        <?php else: ?>
                                            <?php $color = "black"?>
                                        <?php endif; ?>
                                    
                                        
                                    <?php endif; ?>
                                    <td class="first-row" style="color:<?php echo e($color); ?>">
                                        <?php echo e($orders->status->name); ?>

                                    </td>
                                    <td class="first-row">
                                        <a class="btn" href="<?php echo e(url('account/my-order/show/'.$orders->id.'')); ?>">Chi tiết</a>
                                    </td>
                                </tr>                          
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/front/account/my-order/index.blade.php ENDPATH**/ ?>