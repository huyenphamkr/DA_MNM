

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-4">
    <div class="input-group" style="margin: 10px 0px;">
      <label style="width:150px; margin-top:5px">Trạng thái đơn hàng : </label>
      <select onchange="StatusChange()" id="status" name="status"  class="custom-select">
        <option value="" selected>---Chọn trạng thái cần lọc---</option>
       <?php $__currentLoopData = $statuslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>         
         <option  value="<?php echo e($status->id); ?>"><?php echo e($status->name); ?></option>            
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>
  </div>

  <div class="col-2">
    <div class="input-group" style="margin: 10px 0px;">
      <label style="width:70px; margin-top:5px">Sắp xếp: </label>
      <select onchange="SortChange()" id="sort" name="sort"  class="custom-select">
        <option value="1" >Giảm</option>  
        <option value="0" >Tăng</option>   
      </select>
    </div>
  </div>
  <div class="col-6">
    <form action="">
      <div class="form-group" style="margin-top: 10px">
        <div class="input-group ">
            <input type="search" name="key" class="form-control" placeholder="Nhập mã hóa đơn cần tìm vào đây" value="">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-2">
    <div class="input-group" style="margin: 0px 0px;">
      <label style="width:60px; margin-top:5px">Hiển thị  </label>
      <select id="show" name="show"  class="custom-select">
         <option value="1" >10</option>  
         <option value="25" >25</option>          
         <option value="50" >50</option>          
         <option value="100" >100</option>  
      </select>
      <label style="width:70px; margin-top:5px;margin-left:5px">dòng: </label>
    </div>
  </div>
  
</div>


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
            <th>Khách hàng</th>
            <th>Nhân viên</th>
            <th>Ngày lập</th>
            <th>Giờ lập</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th style="width:100px">Chức năng</th>
        </tr>
        </thead>
          <tbody>
            
              <?php $__currentLoopData = $orderslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr style="text-align: center">
                  <td><?php echo e($key+1); ?></td>
                  <td><?php echo e($orders->id); ?></td>
                  <td style="text-align: left"><?php echo e($orders->customer->name); ?></td>
                  <td style="text-align: left">
                    <?php if($orders->employee_id == null): ?>
                       <?php echo e(" "); ?>

                    <?php else: ?>
                      <?php echo e($orders->employee->name); ?>

                    <?php endif; ?>                    
                  </td>        
                  <td><?php echo e(date_format(date_create($orders->date),"d/m/Y")); ?></td> 
                  <td><?php echo e(date_format(date_create($orders->date),"H:i:s")); ?></td> 
                  <td><?php echo e(number_format($orders->total, 0, ',', '.')); ?> VND</td>
                  <?php $arr = array(1 => "warning",2 => "info",3 => "info",4 => "info",5 => "success",6 => "danger");?>
                  <td>
                    <?php if($orders->status->id == 1): ?>
                    <span style="color: black; font-size: 1rem" class="badge badge-warning"><?php echo e($orders->status->name); ?></span>      
                    <?php else: ?>
                    <span style="font-size: 1rem" class="badge badge-<?php echo e($arr[$orders->status->id]); ?>"><?php echo e($orders->status->name); ?></span>       
                  <?php endif; ?>                  
                  </td>
                  <td >
                    <a class="btn btn-primary btn-sm" href="<?php echo e(url('admin/orders/show/'.$orders->id.'')); ?>">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" target="_blank"  href="<?php echo e(url('admin/orders/print/'.$orders->id.'')); ?>" style="background-color: green; border-color: green;">
                      <i class="fas fa-print"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
      </table>
      

      <?php echo $orderslist->appends(request()->all())->links('vendor.pagination.default'); ?>

    </div>
  </div>
<!--/.col (left) -->
</div>
<!-- /.row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('handle'); ?>
<script>

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
  }
});

const color =["warning", "info", "info", "info", "success", "danger"];
$(document).ready(function() {

  $("#show").on('change', function(){
    var $show = document.getElementById("show").value;
  $.ajax({
    url: "<?php echo e(route('filter')); ?>",
    method: "GET",
    data: {
          'show' : $show,
      },      
    success: function(result) {  
      console.log(result);
      var orders = result.orderslist;
      var status = result.statuslist;
      var users = result.users;
      var html = '';
      if(orders.length > 0)
      {
        for(let i=0; i<orders.length;i++){
          var date = new Date(Date.parse(orders[i]['date']));
          html += '<tr style="text-align: center">\
            <td>'+(i+1)+'</td>\
            <td>'+ orders[i]['id'] +'</td>';
            
            for(let j=0; j<users.length;j++){
              if(users[j]['id'] === orders[i]['user_id'])
              {
                html += ' <td style="text-align: left">'+ users[j]['name'] +'</td>';
              }             
            }
            if(orders[i]['employee_id'] == null)
              {
                html += ' <td style="text-align: left">'+ " " +'</td>';
              }
            for(let j=0; j<users.length;j++){
              if(users[j]['id'] === orders[i]['employee_id'])
              {
                html += ' <td style="text-align: left">'+ users[j]['name'] +'</td>';
              }            
            }           
            
            html +='<td>'+date.getDate()+'/'+(date.getMonth()+1)+'/'+date.getFullYear()+'</td>\
            <td>'+date.getHours()+':'+(date.getMinutes())+':'+date.getSeconds()+'</td>\
            <td>'+ new Intl.NumberFormat('it-IT', { style: 'currency', currency: 'VND' }).format(orders[i].total )+ '</td>\
            <td>';
              for(let k=0; k<status.length;k++){
                if(orders[i]['status_id'] === status[k]['id'])
                {
                  if (orders[i]['status_id']  === 1){
                      html += '<span style="color: black; font-size: 1rem" class="badge badge-warning">'+status[k]['name']+'</span>';
                  }else{
                      html += '<span style="font-size: 1rem" class="badge badge-'+color.at((orders[i]['status_id']-1))+'">'+status[k]['name']+'</span></td>';      
                  }     
                }
              }                      
          html +='<td>\
            <a class="btn btn-primary btn-sm" href="show/'+ orders[i]['id'] +'">\
              <i class="fas fa-eye"></i>\
            </a>\
            <a class="btn btn-primary btn-sm" target="_blank" href="print/'+ orders[i]['id'] +'" style="background-color: green; border-color: green;">\
              <i class="fas fa-print"></i>\
            </a>\
          </td>\
          </tr>';
        }
      }
      else
      {
        html += '<td>Không có kết quả .  . .</td>';
      }
      $("tbody").html(html);
    }    
  });
  });
});
function StatusChange() {    
  var $id = document.getElementById("status").value;
  $.ajax({
    url: "<?php echo e(route('filter')); ?>",
    method: "GET",
    data: {
          'id' : $id,
      },      
    success: function(result) {  
      console.log(result);
      var orders = result.orderslist;
      var status = result.statuslist;
      var users = result.users;
      var html = '';
      if(orders.length > 0)
      {
        for(let i=0; i<orders.length;i++){
          var date = new Date(Date.parse(orders[i]['date']));
          html += '<tr style="text-align: center">\
            <td>'+(i+1)+'</td>\
            <td>'+ orders[i]['id'] +'</td>';
            for(let j=0; j<users.length;j++){
              if(users[j]['id'] === orders[i]['user_id'])
              {
                html += ' <td style="text-align: left">'+ users[j]['name'] +'</td>';
              }             
            }
            if(orders[i]['employee_id'] == null)
              {
                html += ' <td style="text-align: left">'+ " " +'</td>';
              }
            for(let j=0; j<users.length;j++){
              if(users[j]['id'] === orders[i]['employee_id'])
              {
                html += ' <td style="text-align: left">'+ users[j]['name'] +'</td>';
              }            
            }   
            html +='<td>'+date.getDate()+'/'+(date.getMonth()+1)+'/'+date.getFullYear()+'</td>\
            <td>'+date.getHours()+':'+(date.getMinutes())+':'+date.getSeconds()+'</td>\
            <td>'+ new Intl.NumberFormat('it-IT', { style: 'currency', currency: 'VND' }).format(orders[i].total )+ '</td>\
            <td>';
              for(let k=0; k<status.length;k++){
                if(orders[i]['status_id'] === status[k]['id'])
                {
                  if (orders[i]['status_id']  === 1){
                      html += '<span style="color: black; font-size: 1rem" class="badge badge-warning">'+status[k]['name']+'</span>';
                  }else{
                      html += '<span style="font-size: 1rem" class="badge badge-'+color.at((orders[i]['status_id']-1))+'">'+status[k]['name']+'</span></td>';      
                  }     
                }
              }                      
          html +='<td>\
            <a class="btn btn-primary btn-sm" href="show/'+ orders[i]['id'] +'">\
              <i class="fas fa-eye"></i>\
            </a>\
            <a class="btn btn-primary btn-sm"  href="print/'+ orders[i]['id'] +'" style="background-color: green; border-color: green;">\
              <i class="fas fa-print"></i>\
            </a>\
          </td>\
          </tr>';
        }
      }
      else
      {
        html += '<td>Không có kết quả .  . .</td>';
      }
      $("tbody").html(html);
    }    
  });
}


function SortChange() {    
  var $sort = document.getElementById("sort").value;
  $.ajax({
    url: "<?php echo e(route('filter')); ?>",
    method: "GET",
    data: {
          'sort' : $sort,
      },      
    success: function(result) {  
      console.log(result);
      var orders = result.orderslist;
      var status = result.statuslist;
      var users = result.users;
      var html = '';
      if(orders.length > 0)
      {
        for(let i=0; i<orders.length;i++){
          var date = new Date(Date.parse(orders[i]['date']));
          html += '<tr style="text-align: center">\
            <td>'+(i+1)+'</td>\
            <td>'+ orders[i]['id'] +'</td>';

            for(let j=0; j<users.length;j++){
              if(users[j]['id'] === orders[i]['user_id'])
              {
                html += ' <td style="text-align: left">'+ users[j]['name'] +'</td>';
              }             
            }
            if(orders[i]['employee_id'] == null)
              {
                html += ' <td style="text-align: left">'+ " " +'</td>';
              }
            for(let j=0; j<users.length;j++){
              if(users[j]['id'] === orders[i]['employee_id'])
              {
                html += ' <td style="text-align: left">'+ users[j]['name'] +'</td>';
              }            
            }   
            html +='<td>'+date.getDate()+'/'+(date.getMonth()+1)+'/'+date.getFullYear()+'</td>\
            <td>'+date.getHours()+':'+(date.getMinutes())+':'+date.getSeconds()+'</td>\
            <td>'+ new Intl.NumberFormat('it-IT', { style: 'currency', currency: 'VND' }).format(orders[i].total )+ '</td>\
            <td>';
              for(let k=0; k<status.length;k++){
                if(orders[i]['status_id'] === status[k]['id'])
                {
                  if (orders[i]['status_id']  === 1){
                      html += '<span style="color: black; font-size: 1rem" class="badge badge-warning">'+status[k]['name']+'</span>';
                  }else{
                      html += '<span style="font-size: 1rem" class="badge badge-'+color.at((orders[i]['status_id']-1))+'">'+status[k]['name']+'</span></td>';      
                  }     
                }
              }                      
          html +='<td>\
            <a class="btn btn-primary btn-sm" href="show/'+ orders[i]['id'] +'">\
              <i class="fas fa-eye"></i>\
            </a>\
            <a class="btn btn-primary btn-sm"  href="print/'+ orders[i]['id'] +'" style="background-color: green; border-color: green;">\
              <i class="fas fa-print"></i>\
            </a>\
          </td>\
          </tr>';
        }
      }
      else
      {
        html += '<td>Không có kết quả .  . .</td>';
      }
      $("tbody").html(html);
    }    
  });
}
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/orders/list.blade.php ENDPATH**/ ?>