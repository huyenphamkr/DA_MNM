
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12" >
    <!-- Main content -->
      <div class="row no-print" style="margin: 10px 0px">
        <div class="col-4">
          <a href="<?php echo e(url('admin/orders/list')); ?>">
            <button type="button"  class="btn btn-primary" ><i class="fas fa-arrow-left"></i> Trở về</button>
          </a>
          <a id="download"> <button type="button"  class="btn btn-primary" style="margin: 0 15px;">
            <i class="fas fa-download"></i> Lưu ảnh
            </button>
          </a>
          <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(url('admin/orders/print/'.$order->id.'')); ?>"  id="print" rel="noopener" target="_blank">
            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i> In</button>
          </a>
        </div>       
      </div>
  </div>
</div>
<div class="col-8">
  <div class="input-group" style="margin: 10px 0px;width: 490px;">
    <label style="width:150px; margin-top:5px">Trạng thái đơn hàng : </label>
    <select id="status" name="status"  class="custom-select">
     <?php $__currentLoopData = $statuslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>         
       <option  value="<?php echo e($status->id); ?>"                    
       <?php if($order->status_id == $status->id): ?>                    
       <?php echo e("selected"); ?>

       <?php endif; ?>                
       ><?php echo e($status->name); ?></option>            
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <a rel="noopener" target="_blank">
      <button onclick="StatusChange(<?php echo e($order->id); ?>)" style="width:150px; margin-left:10px" type="button" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật</button>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>

<div class="row" id = "exportBillToImage">
  <div class="col-12">
    <!-- Main content -->
    <div class="invoice p-3 mb-3">
      <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h4>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <i class="fas fa-globe"></i> Furniture Store   
            <small class="float-right">Mã hóa đơn: # <?php echo e($order->id); ?> - Ngày lập: <?php echo e(date("m-d-Y", strtotime($order->date))); ?>

            </small>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-6 invoice-col"> 
          <address>
            <strong>Furniture Store</strong><br>
            273 An Dương Vương, phường 3, quận 5, TPHCM <br>
            Số điện thoại: (804) 123-5432<br>
            Email: it.k19.company@gmail.com <br>
            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($employee->employee_id == null): ?>
                Người lập đơn: <?php echo e(""); ?>   
              <?php else: ?>
                Người lập đơn: <?php echo e($employee->employee->name); ?>   
              <?php endif; ?>                       
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-6 invoice-col">
          Người mua:
          <address>
          <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <strong><?php echo e($customer->customer->name); ?></strong><br>
            Số điện thoại: <?php echo e($customer->customer->phone_number); ?><br>
            Địa chỉ: <?php echo e($customer->customer->address); ?><br>
            Email: <?php echo e($customer->customer->email); ?>                  
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </address>
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
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
            $cod = 0;
            $sum = 0;
            $count = 0;
             ?>
              <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                 
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
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
          <p class="lead">Ghi chú:</p>  
          <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;"><?php echo e($order->note); ?></p>          
          <p class="lead">Phương thức thanh toán:</p>           
            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;"><?php echo e($order->payment); ?></p>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>        
        <!-- /.col -->
    
        <div class="col-6">
          <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <p class="lead">Ngày thanh toán: <?php echo e(date("m-d-Y", strtotime($order->date))); ?> </p>
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
                <td><?php echo e(number_format($order->total, 0, ',', '.')); ?> VND</td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->      
    </div>
    <!-- /.invoice -->
  </div>
  <!-- /.col -->
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
<script>

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
  }
});

function StatusChange(id) {    
  var x = document.getElementById("status").value; 
 // alert("id: " + id +" - status : "+x);
    $.ajax({
      url: 'update/'+ id  + '/' + x,
      contentType: "application/json; charset=utf-8",
      dataType: 'json',  
      data: {
            orderID : id,
            statusID : x,
        },                
      method: "POST",
      success: function(result) {
        console.log(result);
        if(result.success)
        {
          alert(result.success); 
        }
        else
        {
          alert(result.error); 
        }
        location.reload();
      },
  });
}
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/orders/show.blade.php ENDPATH**/ ?>