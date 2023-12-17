

<?php $__env->startSection('content'); ?>

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary mt-3">
      <div class="card-header">
        <h3 class="card-title"><?php echo e($title); ?></h3>
      </div>

      <form action="" method="POST">
          
          <div class="card-body">
          <div class="form-group">
              <label for="user">Tên Người Dùng</label>
              <input type="text" name="name" value="<?php echo e($user->name); ?>" class="form-control" id="user" placeholder="Nhập tên người dùng">
            </div>
            <div class="form-group">
              <label for="user">Email</label>
              <input type="text" name="email" value="<?php echo e($user->email); ?>" class="form-control" id="user" placeholder="Nhập emaik">
            </div>
            <div class="form-group">
              <label for="user">Quyền</label>
              <input type="text" name="role" value="<?php echo e($user->role_id); ?>" class="form-control" id="user" placeholder="Nhập quyền">
            </div>
            <div class="form-group">
              <label for="user">Địa chỉ</label>
              <input type="text" name="address" value="<?php echo e($user->address); ?>" class="form-control" id="user" placeholder="Nhập địa chỉ">
            </div>
            <div class="form-group">
              <label for="user">Số điện thoại</label>
              <input type="text" name="phone_number" value="<?php echo e($user->phone_number); ?>" class="form-control" id="user" placeholder="Nhập sđt ">
            </div>
            <div class="form-group clearfix">
              <label>Giới tính</label>
              <div class="icheck-success">
                <input type="radio" value="Nam" type="radio" id="male" name="gender" <?php echo e((($user->gender) == "Nam") ? 'checked' : ""); ?>>
                <label for="male">Nam</label>
              </div>
              <div class="icheck-success">
                <input type="radio"  value="Nữ" type="radio" id="female" name="gender" <?php echo e((($user->gender) == "Nữ") ? 'checked' : ""); ?>>
                <label for="female">Nữ</label>
              </div>
            </div>
            <div class="form-group clearfix">
              <label>Kích hoạt </label>
              <div class="icheck-success">
                <input type="radio" value="1" type="radio" id="active" name="active" <?php echo e((($user->active) == "1") ? 'checked' : ""); ?>>
                <label for="active">Có</label>
              </div>
              <div class="icheck-danger">
                <input type="radio"  value="0" type="radio" id="no_active" name="active" <?php echo e((($user->active) == "0") ? 'checked' : ""); ?>>
                <label for="no_active">Không</label>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Người Dùng</button>
          </div>
          <?php echo csrf_field(); ?>
        </form>
    </div>
  </div>
  <!--/.col (left) -->
</div>
<!-- /.row -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/account/edit.blade.php ENDPATH**/ ?>