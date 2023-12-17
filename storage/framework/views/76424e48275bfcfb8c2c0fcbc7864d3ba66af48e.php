
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12" >
      <div class="row no-print" style="margin: 10px 0px">
        <div class="col-4">
          <a href="<?php echo e(url('admin/warehouse/purchase/list')); ?>">
            <button type="button"  class="btn btn-primary" ><i class="fas fa-arrow-left"></i> Trở về</button>
          </a>
          <a id="download"> <button type="button"  class="btn btn-primary" style="margin: 0 15px;">
            <i class="fas fa-download"></i> Lưu ảnh
            </button>
          </a>
          <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(url('admin/warehouse/purchase/print/'.$purchase->id.'')); ?>"  id="print" rel="noopener" target="_blank">
            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i> In</button>
          </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>       
      </div>
  </div>
</div>
<div class="row" id = "exportBillToImage">
  <div class="col-12">
    <div class="invoice p-3 mb-3">
      <div class="row">
        <div class="col-12">
          <h4>
            <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <i class="fas fa-globe"></i> Furniture Store   
            <small class="float-right">Mã phiếu nhập: # <?php echo e($purchase->id); ?> - Ngày lập: <?php echo e(date("m-d-Y", strtotime($purchase->date))); ?>

            </small>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </h4>
        </div>
      </div>
      <div class="row invoice-info">
        <div class="col-sm-6 invoice-col"> 
          <address>
            <strong>Furniture Store</strong><br>
            273 An Dương Vương, phường 3, quận 5, TPHCM <br>
            Số điện thoại: (804) 123-5432<br>
            Email: it.k19.company@gmail.com <br>
            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                Người lập đơn: <?php echo e($employee->user->name); ?>                        
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
          </address>
        </div>
        <div class="col-sm-6 invoice-col">
          Người bán:
          <address>
          <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <strong><?php echo e($supplier->supplier->name); ?></strong><br>
            Số điện thoại: <?php echo e($supplier->supplier->phone_number); ?><br>
            Địa chỉ: <?php echo e($supplier->supplier->address); ?><br>
            
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </address>
        </div>
      </div>
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
          <tr style="text-align: center">
            <th>#</th>            
            <th>Tên sản phẩm</th>            
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>
        </tr>
        </thead>
          <tbody>
            <?php 
            $key=1;
            $cod = 30000;
            $sum = 0;
            $count = 0;
             ?>
              <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $purchase->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                 
                  <tr style="text-align: center">
                    <td><?php echo e($key++); ?></td>
                    <td ><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->pivot->quantity); ?></td>
                    <td ><?php echo e(number_format($product->pivot->price, 0, ',', '.')); ?> VND</td>
                    <td ><?php echo e(number_format($product->pivot->price*$product->pivot->quantity, 0, ',', '.')); ?> VND</td>
                    <?php 
                      $sum += $product->pivot->price*$product->pivot->quantity;
                      $count += $product->pivot->quantity ;                    
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                           
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <p class="lead">Ghi chú:</p>  
          <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;"><?php echo e($purchase->note); ?></p>          
          <p class="lead">Phương thức thanh toán:</p>           
            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;"><?php echo e($purchase->payment); ?></p>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>        
        <div class="col-6">
          <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
          <div class="table-responsive">
            <table class="table">
              <tbody>
              <tr>
                <th style="width:50%">Tổng tiền hàng:</th>
                <td><?php echo e(number_format($sum, 0, ',', '.')); ?> VND</td>
              </tr>
              <tr>
                <th style="width:50%">Tổng số lượng hàng:</th>
                <td><?php echo e($count); ?> Cái</td>
              </tr>
              <tr>
                <th>Tổng cộng tiền thanh toán:</th>
                <td><?php echo e(number_format($purchase->total, 0, ',', '.')); ?> VND</td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
          </div>
        </div>
      </div> 
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('handle'); ?>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script type="text/javascript">

$(document).ready(function(){
  var element = $("#exportBillToImage");
  $("#download").on('click', function(){
    html2canvas(element, {
      onrendered: function(canvas) {         
        var imageData = canvas.toDataURL("image/jpg");
        var newData = imageData.replace(/^data:image\/jpg/, "data:application/octet-stream");
        $("#download").attr("download", "bill.jpg").attr("href", newData);
      }
    });
  });
});

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.warehouse.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/warehouse/purchase/show.blade.php ENDPATH**/ ?>