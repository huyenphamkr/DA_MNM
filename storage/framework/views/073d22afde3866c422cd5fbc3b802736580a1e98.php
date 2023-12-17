

<?php $__env->startSection('content'); ?>

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary mt-3">
      <div class="card-header">
        <h3 class="card-title"><?php echo e($title); ?></h3>
      </div>

      <form action="" method="POST"  enctype="multipart/form-data">
          
          <div class="card-body">
            <div class="form-group">
              <label for="category">Tên danh mục</label>
              <input type="text" name="name" class="form-control" id="category" placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
              <label for="category">Mô tả</label>
              <textarea type="text" name="description" id="category" class="form-control ckeditor" placeholder="Nhập mô tả danh mục"></textarea>
            </div>
            
            <div class="form-group clearfix">
              <label>Kích hoạt </label>
              <div class="icheck-success">
                <input type="radio" value="1" type="radio" id="active" name="active" checked="">
                <label for="active">Có</label>
              </div>
              
              <div class="icheck-danger">
                <input type="radio"  value="0" type="radio" id="no_active" name="active">
                <label for="no_active">Không</label>
              </div>
            </div>

             <div class="form-group">
              <label for="imageProduct">Hình ảnh</label>
              <input type="file" name="fileimage" class="form-control" id="imageProduct">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo Danh Mục</button>
          </div>
          <?php echo csrf_field(); ?>
        </form>
   </div>
  </div>
<!--/.col (left) -->
</div>
<!-- /.row -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/category/add.blade.php ENDPATH**/ ?>