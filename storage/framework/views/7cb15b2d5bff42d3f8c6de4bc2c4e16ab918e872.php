

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card card-primary mt-3">
      <div class="card-header">
        <h3 class="card-title"><?php echo e($title); ?></h3>
      </div>
      <div class="card-body">
        <div class="row">
        <div class="col-md-4">                  
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="product">Người lập:</label>
              <input type="text" name="employee" class="form-control" id="employee" value="<?php echo e(Auth::user()->name); ?>" disabled>
            </div>
            <div class="form-group">
                <label for="product">Nhà cung cấp</label>
                <select name="supplier" id="supplier" class="custom-select">
                  <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
                </select>
            </div>  
            <div class="form-group">
              <button onclick="AddPurchase()" type="submit" class="btn btn-primary">Lập phiếu nhập</button>
            </div>
            <?php echo csrf_field(); ?>
          </form>
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
                            <a href="#" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </a>
                          </div>
                        </div>
                    </div>
                  </div>                     
                  <div class="card-body table-responsive p-0" style="height: 361px;">
                    <table id="tableProduct" class="table table-head-fixed text-nowrap"></table>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-12"><br>
            <h4 style="text-align: center">Chi tiết phiếu nhập</h4>
            <table id="tableContent" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
            </table>
        </div>
        <div class="col-12">
          <div class="table-responsive">
            <table class="table" id="sumdata"></table>
          </div>
        </div>    
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('handle'); ?>

<script>

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
  }
});


let detailPurchase = new Array();
let productadd = new Array();
let listproduct = new Array();
var ship = 0;
loadTable();
loadProduct();

//Bat su kien nhap vao o tim kiem
$(document).ready(function() {
  $("#searchValue").keyup(function() {
    var value = $("#searchValue").val();
    $.ajax({
      url: 'add/search?key=' + value, 
      contentType: "application/json; charset=utf-8",
      dataType: 'json',              
      method: "GET",
      success: function(result) {
        products = result.listproduct;
        categories = result.categories;
        var data = JSON.parse(products);
        var category = JSON.parse(categories);
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
  for ($i = 0; $i < detailPurchase.length; $i++) {      
    SumPrice += detailPurchase[$i].price * detailPurchase[$i].amount;
    SumAmount += Number(detailPurchase[$i].amount);
    _xhtml += '<tr>' +
      '  <td style="text-align: center">' + ($i + 1) + '</td>' +
      '  <td style="text-align: center">' + detailPurchase[$i].id + '</td>' +
      '  <td>'+ detailPurchase[$i].name + '</td>' +
      '  <td style="text-align: center">' + Number(detailPurchase[$i].amount) + '</td>' +
      '  <td style="text-align: center">' + 
        new Intl.NumberFormat('it-IT', { style: 'currency', currency: 'VND' }).format(detailPurchase[$i].price )                  
        + '</td>' +
      '  <td style="text-align: center">' + 
        new Intl.NumberFormat('it-IT', { style: 'currency', currency: 'VND' }).format(detailPurchase[$i].price * detailPurchase[$i].amount)                  
        + '</td>' +
      '  <td style="text-align: center">' +
      '    <button onclick="editItem(\'' + detailPurchase[$i].id  + '\');" type="button" class="btn btn-primary btn-sm" href="#">' +
      '       <i class="fas fa-edit"></i>' +
      '    </button>' +
      '    <button onclick="deleteItem(\'' + detailPurchase[$i].id  + '\')" type="button" class="btn btn-danger btn-sm" href="#">' +
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
      ' <td>'+SumAmount+' cái</td>' +
    ' </tr>' +
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
      var check_amount = true;
      for (var key in data) {
        $obj = data[key];
        if(id === $obj.id)
        {        
          for ($i = 0; $i < detailPurchase.length; $i++) {
          //kiểm tra thấy sản phẩm có đc thêm trước chưa
            if (detailPurchase[$i].id == id) 
            { //id san pham đã đc thêm => trùng -> cập nhật số lượng
              amount = Number(detailPurchase[$i].amount) + Number(amount_pro );
                objIndex = detailPurchase.findIndex((obj => obj.id == id));
                console.log("Before update: ", detailPurchase[objIndex])
                detailPurchase[objIndex].amount = amount;
                loadTable();
                return;                     
            }   
          }
          $.ajax({
            url: 'detail/'+ id ,
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
              detailPurchase.push(newItem);
              console.table(detailPurchase);
              alert("Thêm thành công");
              loadTable();
            }
          });            
        }               
      }
    }
  });
}

//sửa sản phẩm bảng chi tiết
function editItem(id)
{
  amount = prompt('Nhập số lượng sản phẩm cần sửa: ');
  objIndex = detailPurchase.findIndex((obj => obj.id == id));
  //Log object to Console.
  //console.log("Before update: ", detailPurchase[objIndex];
  //Update object's name property.
  detailPurchase[objIndex].amount = amount;
  //Log object to console again.
  //console.log("After update: ", detailPurchase[objIndex])
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
  while ($index < detailPurchase.length && detailPurchase[$index].id != id) {
      $index++;
      console.log($index);
  }
  if ($index == 0 && detailPurchase[$index].id != id) {
      return;
  }
  for ($i = $index; $i < detailPurchase.length - 1; $i++) {
      detailPurchase[$i] = detailPurchase[$i + 1];
  }
  detailPurchase.pop();
  loadTable();
}

function AddPurchase()
{
  $employee_id = '<?php echo e(Auth::user()->id); ?>';
  $supplier_id = $("#supplier").val();
  if(detailPurchase.length === 0)
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
      supplier_id: $supplier_id,
      data : detailPurchase,
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
<?php echo $__env->make('admin.warehouse.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\PTPMMNM\DA_MNM\resources\views/admin/warehouse/purchase/add.blade.php ENDPATH**/ ?>