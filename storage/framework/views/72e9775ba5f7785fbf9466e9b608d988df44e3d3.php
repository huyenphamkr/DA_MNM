

<?php $__env->startSection('content'); ?>

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
            <th>#</th>
            <th>ID</th>
            <th>Tên slide</th>
            <th style="width:300px;">Hình ảnh</th>
            <th>Mô tả</th>
            <th style="width:100px;">Link</th>
            <th>Kích hoạt</th>
            <th>Cập nhật</th>
            <th style="width:100px">Chức năng</th>
        </tr>
        </thead>
          <tbody>
            
              <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td style="text-align: center"><?php echo e($key+1); ?></td>
                  <td style="text-align: center"><?php echo e($slide->id); ?></td>
                  <td style="text-align: center"><?php echo e($slide->name); ?></td>
                  <td>
                      <img src="<?php echo e(asset($slide->image)); ?>" alt="" style="width:300px; height:100px"> 
                  </td>        
                  <td><?php echo e($slide->description); ?></td>
                  <td> <?php echo e($slide->link); ?></td>
                  <td style="text-align: center">
                    <?php if($slide->active == 0): ?>
                      <span class = "btn btn-danger btn-xs">Không</span>
                    <?php else: ?>
                      <span class = "btn btn-success btn-xs">Có</span>
                    <?php endif; ?> 
                  </td>
                  <td><?php echo e($slide->updated_at); ?></td>  
                  <td style="text-align: center">
                    <a class="btn btn-primary btn-xs" href="<?php echo e(url('admin/slide/edit/'.$slide->id.'')); ?>">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-xs" href="<?php echo e(url('admin/slide/destroy/'.$slide->id.'')); ?>">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
                
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
      </table>
      
      <?php echo $slides->links('vendor.pagination.bootstrap-5'); ?>

    </div>
  </div>
<!--/.col (left) -->
</div>
<!-- /.row -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/slide/list.blade.php ENDPATH**/ ?>