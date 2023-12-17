<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
UID:<?php echo e($user->user_id); ?>

<br>
Total Order: <?php echo e($user->totalOrder); ?> 
<br>
Total Price:<?php echo e($user->totalPrice); ?>

    <br>
    <br>
    <br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/statistic/test.blade.php ENDPATH**/ ?>