

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
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="product">Người lập đơn:</label>
                      <input type="text" name="employee" class="form-control" id="employee" value="<?php echo e(Auth::user()->name); ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="product">Mã khách hàng</label>                        
                        <div class="input-group">
                          <input type="text" name="id" id="id" class="form-control" placeholder="Nhập mã khách hàng">
                          <div class="input-group-append">
                              <button onclick="getInfo()" type="button" class="btn btn-primary">Lấy thông tin</button>
                          </div>
                      </div>
                    </div>  

                    <div class="form-group">
                        <label for="product">Tên khách hàng</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên khách hàng">
                    </div>  
      
                    <div class="form-group">
                        <label for="product">Số điện thoại</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập số điện thoại">
                    </div>  
                   
                    <div class="form-group">
                        <label for="product">Địa chỉ:</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ">
                    </div>                   
                </div>               

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <h3 class="card-title">Danh sách sản phẩm</h3>            
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                  <input type="text" id="searchValue" name="key" class="form-control float-right" placeholder="Tìm kiếm sản phẩm . . .">            
                                  <div class="input-group-append">
                                    <a href="<?php echo e(url('admin/warehouse/orders/search')); ?>" class="btn btn-default">
                                      
                                      <i class="fas fa-search"></i>
                                      
                                    </a>
                                  </div>
                                </div>
                            </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 361px;">
                            <table id="tableProduct" class="table table-head-fixed text-nowrap">
                            </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        </div>
                    </div>
                </div>
               <div class="col-md-12"><br>
                    <h4 style="text-align: center">Chi tiết đơn đặt hàng</h4>
                    <table id="tableContent" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                    </table>
                </div>

                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table" id="sumdata"></table>
                  </div>
                </div>
                
          <!-- /.card-body -->
                <div class="card-footer">
                    <button onclick="AddOrder()" type="submit" class="btn btn-primary">Lập đơn đặt hàng</button>
                </div>
          <?php echo csrf_field(); ?>
        </form>
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


let detailOrder = new Array();
let productadd = new Array();
let listproduct = new Array();
var ship = 0;
loadTable();
loadProduct();

//Bat su kien nhap vao o tim kiem
$(document).ready(function() {
  $("#searchValue").keyup(function() {
    var value = $("#searchValue").val();
    // var value = event.target.value.toLowerCase();
    $.ajax({
      url: 'add/search?key='+value ,
      contentType: "application/json; charset=utf-8",
      dataType: 'json',              
      method: "GET",
      success: function(result) {
        products = result.listproduct;
        categories = result.categories;
        var data = JSON.parse(products);
        var category = JSON.parse(categories);
        //console.table(listproduct); 
        //console.table(category);    
        _xhtml = '<thead>' +
          ' <tr>' +
            ' <th>ID</th>' +
            ' <th>Tên sản phẩm</th>' +
            ' <th>Số lượng</th>' +
            ' <th>Giá</th>' +
            ' <th>Danh mục</th>' +
            ' <th>Thêm</th>' +
        ' </tr>' +
        ' </thead> '+
        '<tbody>';
        for (var key in data) {
            $obj = data[key];
            _xhtml += '<tr>'+
              '<td>' + $obj.id + '</td>'+
              '<td><img src="../../../'+$obj.image+ '" alt="' + $obj.name + '" style="width:40px; height:40px; border-radius: 7px;">&ensp;'+ $obj.name +'</td>'+
              '<td>'+ $obj.amount +'</td>'+
              '<td>'
                + new Intl.NumberFormat('it-IT', { style: 'currency', currency: 'VND' }).format($obj.price) +
              '</td>';
              for (var i in category) {
                $objCategory = category[i];
                if($obj.category_id === $objCategory.id) {
                    _xhtml += '<td>'+ $objCategory.name+'</td>';
                }    
              }
              _xhtml +='<td>'+
                '<button onclick="AddProductDetail(' + $obj.id + ')" type="button" class="btn btn-block btn-primary btn-sm">'+
                ' <i class="fas fa-plus-square"></i>'+
                '</button> '+
              '</td>'+
              '</tr>';
            }
            _xhtml  += '</tbody>';
            $("#tableProduct").html(_xhtml);
      }
    });
  });
});

//lấy thông tin khách hàng
function getInfo()
{
  id = $("#id").val();
  if(id == "" || id.length === 0 || !id.trim())
  {
    alert("Vui lòng nhập mã khách hàng")
    return;
  }
  
  $.ajax({
    url: 'getinfo/'+ id ,
    contentType: "application/json; charset=utf-8",
    dataType: 'json',  
    data: {id : id,},                
    method: "POST",
    success: function(result) {
      customer = result.customer;
      console.log(customer);
      if(customer.length == 0 )
      {
        alert("Tài khoản không tồn tại!");
        $("#id").val("");
        return;
      }
      active = customer[0]['active'];
      if(active == 0)
      {
        alert("Tài khoản hiện đang bị khóa. Vui lòng chọn tài khoản khác!");
        $("#id").val("");
        return;
      }
      $("#name").val(customer[0]['name']);
      $("#phone").val(customer[0]['phone_number']);
      $("#address").val(customer[0]['address']);
    }
  });
}

function loadProduct()
{
  $.ajax({
    url: 'add/load' ,
    contentType: "application/json; charset=utf-8",
    dataType: 'json',              
    method: "POST",
    success: function(result) {
      products = result.listproduct;
      categories = result.categories;
      var data = JSON.parse(products);
      var category = JSON.parse(categories);
      //console.table(listproduct); 
      //console.table(category);    
      _xhtml = '<thead>' +
        ' <tr>' +
          ' <th>ID</th>' +
          ' <th>Tên sản phẩm</th>' +
          ' <th>Số lượng</th>' +
          ' <th>Giá</th>' +
          ' <th>Danh mục</th>' +
          ' <th>Thêm</th>' +
      ' </tr>' +
      ' </thead> '+
      '<tbody>';
        for (var key in data) {
            $obj = data[key];
            _xhtml += '<tr>'+
              '<td>' + $obj.id + '</td>'+
              '<td><img src="../../../'+$obj.image+ '" alt="' + $obj.name + '" style="width:40px; height:40px; border-radius: 7px;">&ensp;'+ $obj.name +'</td>'+
              '<td>'+ $obj.amount +'</td>'+
              '<td>'
                + new Intl.NumberFormat('it-IT', { style: 'currency', currency: 'VND' }).format($obj.price) +
              '</td>';
              for (var i in category) {
                $objCategory = category[i];
                if($obj.category_id === $objCategory.id) {
                    _xhtml += '<td>'+ $objCategory.name+'</td>';
                }    
              }
              _xhtml +='<td>'+
                '<button onclick="AddProductDetail(' + $obj.id + ')" type="button" class="btn btn-block btn-primary btn-sm">'+
                 ' <i class="fas fa-plus-square"></i>'+
                '</button> '+
              '</td>'+
              '</tr>';
            }
            _xhtml  += '</tbody>';
            $("#tableProduct").html(_xhtml);
    }
  });
}

function loadTable() 
{
  _xhtml = '<thead>' +
    '<tr style="text-align: center">'+
      '<th>#</th>'+
      '<th>ID</th>'+
      '<th>Tên sản phẩm</th>'+
      '<th>Số lượng</th>'+
      '<th>Giá</th>'+
      '<th>Thành tiền</th>'+
      '<th style="width:100px">Chức năng</th>'+
    '</tr>'+
  '</thead>'+
  '<tbody>';
  var SumPrice = 0;
  var SumAmount = 0;
  for ($i = 0; $i < detailOrder.length; $i++) {      
    SumPrice += detailOrder[$i].price * detailOrder[$i].amount;
    SumAmount += Number(detailOrder[$i].amount);
    _xhtml += '<tr>' +
      '  <td style="text-align: center">' + ($i + 1) + '</td>' +
      '  <td style="text-align: center">' + detailOrder[$i].id + '</td>' +
      '  <td>'+ detailOrder[$i].name + '</td>' +
      '  <td style="text-align: center">' + Number(detailOrder[$i].amount) + '</td>' +
      '  <td style="text-align: center">' + 
        new Intl.NumberFormat('it-IT', { style: 'currency', currency: 'VND' }).format(detailOrder[$i].price )                  
        + '</td>' +
      '  <td style="text-align: center">' + 
        new Intl.NumberFormat('it-IT', { style: 'currency', currency: 'VND' }).format(detailOrder[$i].price * detailOrder[$i].amount)                  
        + '</td>' +
      '  <td style="text-align: center">' +
      '    <button onclick="editItem(\'' + detailOrder[$i].id  + '\');" type="button" class="btn btn-primary btn-sm" href="#">' +
      '       <i class="fas fa-edit"></i>' +
      '    </button>' +
      '    <button onclick="deleteItem(\'' + detailOrder[$i].id  + '\')" type="button" class="btn btn-danger btn-sm" href="#">' +
      '      <i class="fas fa-trash"></i>' +
      '    </button>' +
      '  </td>' +
    '</tr>';
    }
  _xhtml += '</tbody>';
  $('#tableContent').html(_xhtml);

  _data = '<tbody> ' +
    '<tr>' +
      '<th style="width:50%">Tổng tiền hàng:</th>' +
      '<td>'+
      new Intl.NumberFormat('it-IT', { style: 'currency', currency: 'VND' }).format(SumPrice)                  
      +'</td>' +
    '</tr>' +
    '<tr>' +
      ' <th style="width:50%">Tổng số lượng hàng:</th>' +
      ' <td>'+SumAmount+' Cái</td>' +
    ' </tr>' +
    // '<tr>' +
    //   ' <th>Phí vận chuyển:</th>' +
    //     '<td>'+new Intl.NumberFormat('it-IT', { style: 'currency', currency: 'VND' }).format(ship) +'</td>' +
    // '</tr>' +
    ' <tr>' +
        '<th>Tổng cộng tiền thanh toán:</th>' +
      ' <td>'+
        new Intl.NumberFormat('it-IT', { style: 'currency', currency: 'VND' }).format(SumPrice+ship);  
        +'</td>' +
      '</tr> ' +
  '</tbody> ';
  $('#sumdata').html(_data);
}

//thêm sản phẩm vào bảng chi tiết
function AddProductDetail(id)
{
  // kiểm tra đầu vào của số lượng
  ship = 0;
  let check = true;
  let amount = 0;
  let amount_pro = 0;
  while (check) {
    amount_pro = prompt('Nhập số lượng sản phẩm: ');
    if (amount_pro === null )
    {
      return;
    }
    if(amount_pro < 1 || isNaN(amount_pro))
    {
      alert('Vui lòng nhập số lượng sản phẩm > 0');
    }
    else{
      amount = amount_pro;
      check = false;
    }
  }


  $.ajax({
    url: 'add/load' ,
    contentType: "application/json; charset=utf-8",
    dataType: 'json',              
    method: "POST",
    success: function(result) {
      products = result.listproduct;
      var data = JSON.parse(products);
      //console.table(listproduct); 
      //console.table(category);    
      var check_amount = true;
      for (var key in data) {
        $obj = data[key];
        if(id === $obj.id)
        {
          if(amount_pro > $obj.amount)
          {
            alert('Số lượng sản phẩm vượt quá số lượng sản phẩm có trong kho !');
            check_amount = false;
            return;
          }
          else
          {
            for ($i = 0; $i < detailOrder.length; $i++) {
            //kiểm tra thấy sản phẩm có đc thêm trước chưa
              if (detailOrder[$i].id == id) 
              { //id san pham đã đc thêm => trùng -> cập nhật số lượng
                amount = Number(detailOrder[$i].amount) + Number(amount_pro );   
                //kiểm tra số lượng sp
                if(amount >  $obj.amount)
                {
                  alert('Số lượng sản phẩm vượt quá số lượng sản phẩm có trong kho');
                  check_amount = false;
                  return ;
                }  
                else
                {
                  objIndex = detailOrder.findIndex((obj => obj.id == id));
                  console.log("Before update: ", detailOrder[objIndex])
                  detailOrder[objIndex].amount = amount;
                  loadTable();
                  return;
                }     
              }   
            }
            $.ajax({
              url: 'adddetail/'+ id ,
              contentType: "application/json; charset=utf-8",
              dataType: 'json',  
              data: {id : id,},                
              method: "POST",
              success: function(result) {
                productadd = result.product_add;
                var newItem = {
                    id: productadd[0]['id'],
                    name: productadd[0]['name'],
                    amount: amount,
                    price: productadd[0]['price'],
                };
                detailOrder.push(newItem);
                console.table(detailOrder);
                alert("Thêm thành công");
                loadTable();
              }
            });
          }  
        }               
      }
    }
  });
}

//sửa sản phẩm bảng chi tiết
function editItem(id)
{
  amount = prompt('Nhập số lượng sản phẩm cần sửa: ');
  objIndex = detailOrder.findIndex((obj => obj.id == id));
  //Log object to Console.
  //console.log("Before update: ", detailOrder[objIndex];
  //Update object's name property.
  detailOrder[objIndex].amount = amount;
  //Log object to console again.
  //console.log("After update: ", detailOrder[objIndex])
  loadTable();
}

//xóa sản phẩm bảng chi tiết
function deleteItem(id, $confirm = false) 
{
  if (!$confirm) {
      if (!confirm("Bạn có muốn xóa chi tiết " + id)) {
          return;
      }
  }
  $index = 0;
  while ($index < detailOrder.length && detailOrder[$index].id != id) {
      $index++;
      console.log($index);
  }
  if ($index == 0 && detailOrder[$index].id != id) {
      return;
  }
  for ($i = $index; $i < detailOrder.length - 1; $i++) {
      detailOrder[$i] = detailOrder[$i + 1];
  }
  detailOrder.pop();
  loadTable();
}


function AddOrder()
{
  $name = $("#name").val();
  $address = $("#address").val();
  $phone = $("#phone").val();
  $employee_id = '<?php echo e(Auth::user()->id); ?>';
  $customer_id = $("#id").val();
  if($customer_id == "" || $customer_id.length === 0 || !$customer_id.trim())
  {
    alert("Vui lòng nhập thông tin hóa đơn");
    return;
  }
  if(detailOrder.length === 0)
  {
    alert("Vui lòng thêm sản phẩm ");
    return;
  }
  $.ajax({
    method: "POST",
    url:'add',
    data:
    {
      employee_id: $employee_id,
      customer_id: $customer_id,
      name : $name,
      address : $address,
      phone : $phone,
      data : detailOrder,
    },
    success: function(result){
      console.log(result);
        alert('Thêm thành công ');
    // alert('Thêm thất bại !!!');
    }
  });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.warehouse.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/warehouse/orders/add.blade.php ENDPATH**/ ?>