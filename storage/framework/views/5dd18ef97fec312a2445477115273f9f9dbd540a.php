

<?php $__env->startSection('content'); ?>

<div class="row" style="margin-top: 10px">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3><?php echo e($purchases); ?></h3>
          <p>Đơn nhập hàng</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="<?php echo e(url('admin/warehouse/purchase/list')); ?>" class="small-box-footer">Thêm thông tin<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3><?php echo e($products); ?></h3>
          <p>Sản phẩm</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="<?php echo e(url('admin/warehouse/product/list')); ?>" class="small-box-footer">Thêm thông tin <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><?php echo e($orders); ?></h3>
          <p>Đơn đặt hàng</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="<?php echo e(url('admin/warehouse/orders/list')); ?>" class="small-box-footer">Thêm thông tin <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3><?php echo e($suppliers); ?></h3>

          <p>Nhà cung cấp</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="<?php echo e(url('admin/warehouse/supplier/list')); ?>" class="small-box-footer">Thêm thông tin <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  
  <table class="table" style="width: 50%;margin:0 auto;font-size: 1rem;">
    <tr>
      <th colspan="2" style="text-align: center;">THÔNG TIN <?php echo e(strtoupper(App\Models\Role::find(Auth::user()->role_id)->name)); ?></th>
    </tr>
    <tr>
      <th>ID</th>
      <td><?php echo e($user->id); ?></td>
    </tr>
    <tr>
      <th>Họ Tên</th>
      <td><?php echo e($user->name); ?></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><?php echo e($user->email); ?></td>
    </tr>
    <tr>
      <th>Giới Tính</th>
      <td><?php echo e($user->gender); ?></td>
    </tr>
    <tr>
      <th>Địa Chỉ</th>
      <td><?php echo e($user->address); ?></td>
    </tr>
    <tr>
      <th>SĐT</th>
      <td><?php echo e($user->phone_number); ?></td>
    </tr>
  </table>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.warehouse.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/warehouse/home.blade.php ENDPATH**/ ?>