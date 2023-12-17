

<?php $__env->startSection('content'); ?>

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary mt-3">

      <div class="card-header">
        <h3 class="card-title"><?php echo e($title); ?></h3>
      </div>

      <form action="" method="POST" enctype="multipart/form-data">
          
          <div class="card-body">
            <div class="row">

             
              <div class="form-group">
                <label for="slide">Tên slide</label>
                <input type="text" value="<?php echo e($slide->name); ?>" name="name" class="form-control" id="slide" placeholder="Nhập tên slide">
              </div>  

              <div class="form-group">
                <label for="slide">Link</label>
                <input type="text" value="<?php echo e($slide->link); ?>" name="link" class="form-control" id="slide" placeholder="Nhập link">
              </div>  

              <div class="form-group">
                <label for="imageSlide">Hình ảnh</label>
                <p>
                    <img src="<?php echo e(asset($slide->image)); ?>" alt="<?php echo e($slide->name); ?>" style="width:300px">
                </p>
                <input type="file" name="fileimage" class="form-control" id="imageSlide">              
              </div>     
              
              <div class="form-group clearfix">
                <label>Kích hoạt </label>
                <div class="icheck-success">
                  <input type="radio" value="1" type="radio" id="active" name="active" <?php echo e((($slide->active) == "1") ? 'checked' : ""); ?>>
                  <label for="active">Có</label>
                </div>
                <div class="icheck-danger">
                  <input type="radio"  value="0" type="radio" id="no_active" name="active" <?php echo e((($slide->active) == "0") ? 'checked' : ""); ?>>
                  <label for="no_active">Không</label>
                </div>
              </div>
            
              <div class="form-group">
                <label for="slide">Mô tả</label>        
                <textarea type="text" name="description" id="demo" class="form-control ckeditor" placeholder="Nhập mô tả slide"><?php echo e($slide->description); ?></textarea>
              </div>
            </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật slide</button>
          </div>
          <?php echo csrf_field(); ?>
        </form>
    </div>
  </div>
<!--/.col (left) -->
</div>
<!-- /.row -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/slide/edit.blade.php ENDPATH**/ ?>