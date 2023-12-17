

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
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="users">Tên Người Dùng</label>
                <input type="text" name="name" class="form-control" id="users" placeholder="Nhập tên người dùng">
              </div>
              <div class="form-group">
                <label for="users">Email</label>
                <input type="text" name="email" class="form-control" id="users" placeholder="Nhập email">
              </div>
              <div class="form-group">
                <label for="users">Quyền</label>
                <select name="role" id="" class="custom-select">
                    <option value="3">Thành viên</option>  
                </select>  
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group clearfix">
                    <label>Giới tính</label>
                    <div class="icheck-success">
                      <input type="radio" value="Nam" type="radio" id="male" name="gender" checked="">
                      <label for="male">Nam</label>
                    </div>
                    <div class="icheck-success">
                      <input type="radio"  value="Nữ" type="radio" id="female" name="gender">
                      <label for="female">Nữ</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
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
                </div>            
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="users">Mật khẩu</label>
                <input type="password" name="password" class="form-control" id="users" placeholder="Nhập mật khẩu">
              </div>
              <div class="form-group">
                <label for="password_confirmation">Nhập lại mật khẩu</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Nhập mật khẩu">
              </div>
              <div class="form-group">
                <label for="users">Địa chỉ</label>
                <input type="text" name="address" class="form-control" id="users" placeholder="Nhập địa chỉ">
              </div>
              <div class="form-group">
                <label for="users">Số điện thoại</label>
                <input type="text" name="phone_number" class="form-control" id="users" placeholder="Nhập sđt">
              </div>
            </div>    
          </div>          
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Tạo Người Dùng</button>
        </div>
        <?php echo csrf_field(); ?>
      </form>
   </div>
  </div>
<!--/.col (left) -->
</div>
<!-- /.row -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/customer/add.blade.php ENDPATH**/ ?>