

<?php $__env->startSection('content'); ?>

<form action="">
  
  <div class="form-group" style="margin-top: 15px">
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
            <th style="width:140px">Tên danh mục</th>
            <th>Mô tả</th>
            <th style="width:85px">Kích hoạt</th>
            <th>Cập nhật</th>
            <th style="width:100px">Chức năng</th>
          </tr>
        </thead>
        <tbody>
      
          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td style="text-align: center"><?php echo e($key+1); ?></td>
          <td style="text-align: center"><?php echo e($category->id); ?></td>
          <td  style="text-align: center">
            <p><?php echo e($category->name); ?></p>
              <img src="<?php echo e(asset($category->image)); ?>" alt="<?php echo e($category->name); ?>" style="width:80px; height:50px"> 
          </td>    
          <td><?php echo e($category->description); ?></td>
          <td style="text-align: center">
            <?php if($category->active == 0): ?>
              <span class = "btn btn-danger btn-ms">Không</span>
            <?php else: ?>
              <span class = "btn btn-success btn-ms">Có</span>
            <?php endif; ?> 
          </td>     
          <td><?php echo e($category->updated_at); ?></td>
          <td style="text-align: center;">
            <a class="btn btn-primary btn-sm" href="<?php echo e(url('admin/category/edit/'.$category->id.'')); ?>">
              <i class="fas fa-edit"></i>
            </a>
            <a class="btn btn-danger btn-sm" href="<?php echo e(url('admin/category/destroy/'.$category->id.'')); ?>">
              <i class="fas fa-trash"></i>
            </a>
          </td>
        </tr>
      
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </tbody>
      </table>
      <?php echo $categories->appends(request()->all())->links('vendor.pagination.bootstrap-5'); ?>

    </div>
  </div>
<!--/.col (left) -->
</div>
<!-- /.row -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/category/list.blade.php ENDPATH**/ ?>