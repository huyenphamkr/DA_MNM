

<?php $__env->startSection('content'); ?>

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary mt-3">
      <div class="card-header">
        <h3 class="card-title">CHECK</h3>
      </div>
    </div>
    <form action="<?php echo e(Route("checkp")); ?>" method="post">
      <input type="text" name="names[]" id="">
      <input type="text" name="names[]" id="">
        <input type="email" value="phen@gmail.com" name="txtemail">
        <input type="submit" name="btn" value="Submit">
    </form>

  </div>
  <!--/.col (left) -->
</div>
<!-- /.row -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/account/check.blade.php ENDPATH**/ ?>