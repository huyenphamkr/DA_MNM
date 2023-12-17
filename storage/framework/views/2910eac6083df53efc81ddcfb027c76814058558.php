

<?php $__env->startSection('content'); ?>

<form action="">
  
  <div class="form-group" >
    <div class="input-group input-group-lg">
        <input type="search" name="key" class="form-control" placeholder="Nhập từ khóa cần tìm vào đây" value="">
        <div class="input-group-append">
            <button type="submit" class="btn btn-lg btn-primary">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
  </div>
</form>

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary mt-3">

      <div class="card-header">
        <h3 class="card-title"><?php echo e($title); ?></h3>
      </div>

      <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
        <thead>
          <tr style="text-align: center">
            <th>STT</th>
            <th>ID</th>
            <th style="width:140px">Tên Nhà Cung Cấp</th>
            <th>Địa chỉ</th>
            <th style="text-align: center">Số điện thoại</th>
            <th style="width:85px">Kích hoạt</th>
            
            <th style="width:100px">Chức năng</th>
          </tr>
        </thead>
        <tbody>
      
          <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td style="text-align: center"><?php echo e($key+1); ?></td>
          <td style="text-align: center"><?php echo e($supplier->id); ?></td>
          <td><?php echo e($supplier->name); ?></td>
              <td><?php echo e($supplier->address); ?></td>
              <td style="text-align: center"><?php echo e($supplier->phone_number); ?></td>
              <td style="text-align: center">
              <?php if($supplier->active == 0): ?>
                  <span class = "btn btn-danger btn-ms">NO</span>
              <?php else: ?>
                  <span class = "btn btn-success btn-ms">YES</span>
              <?php endif; ?> 
              </td>     
              
              <td style="text-align: center;">
                  <a class="btn btn-primary btn-sm" href="<?php echo e(url('admin/warehouse/supplier/edit/'.$supplier->id.'')); ?>">
                      <i class="fas fa-edit"></i>
                  </a>
                  <a class="btn btn-danger btn-sm" href="<?php echo e(url('admin/warehouse/supplier/destroy/'.$supplier->id.'')); ?>">
                      <i class="fas fa-trash"></i>
                  </a>
              </td>
          </tr>
      
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </tbody>
      </table>
      <?php echo $suppliers->links('vendor.pagination.bootstrap-5'); ?>

    </div>
  </div>
<!--/.col (left) -->
</div>
<!-- /.row -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.warehouse.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/warehouse/supplier/list.blade.php ENDPATH**/ ?>