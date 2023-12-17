

<?php $__env->startSection('content'); ?>
<style>
  input::-webkit-datetime-edit-month-field,
  ::-webkit-datetime-edit-day-field,
  ::-webkit-datetime-edit-text {
    display:none;
  }
</style>
<?php 
$now = getdate();
$year = $now["year"]."-".$now["mon"]."-".$now["mday"];
?>
<div class="row">
  <div class="col-4">
    <form action="">
      <div class="form-group">
        <label>Thời gian:</label>
          <div class="input-group date" id="reservationdate" data-target-input="nearest">
              <input type="date" name="year" class="form-control datetimepicker-input" data-target="#reservationdate"
              value="<?php echo e($year); ?>">
              <button style="width:200px" type="submit" class="btn btn-block btn-primary">Lọc</button>
          </div>      
      </div>
    </form>
  </div>
  
  
</div>
<div class="row">
  <div class="col-md-12"> 
    <div class="card card-primary mt-3">
      <div class="card-header">
        <h3 class="card-title"><?php echo e($title); ?></h3>
      </div>
      <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
              <div class="col-sm-12">
                  <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                      <thead>
                        <tr role="row" style="text-align: center">                      
                          <th>Stt</th>
                          <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">Mã Khách hàng</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Tên Khách hàng</th>                         
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Số đơn đặt hàng</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Doanh thu</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr class="odd" style="text-align: center">
                            <td><?php echo e($key+1); ?></td>
                            <td class="sorting_1 dtr-control"><?php echo e($user->user_id); ?></td>
                            <?php $__currentLoopData = $listUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item->id === $user->user_id): ?>
                            <td style="text-align: left"><?php echo e($item->name); ?></td>                                
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            <td><?php echo e($user->totalOrder); ?></td>
                            <td><?php echo e(number_format($user->totalPrice, 0, ',', '.')); ?> VND</td> 
                            
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>              
                  </table>
              </div>       
          </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('handle'); ?>
<!-- DataTables  & Plugins -->
<script src="<?php echo e(asset('template/admin/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('template/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('template/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('template/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('template/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/statistic/index.blade.php ENDPATH**/ ?>