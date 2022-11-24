@extends('admin.main')
@section('content')
<div class="row">
  <div class="col-12" >
    <!-- Main content -->
      <div class="row no-print" style="margin: 10px 0px">
        <div class="col-4">
          <a href="{{ url('admin/orders/list') }}">
            <button type="button"  class="btn btn-primary" ><i class="fas fa-arrow-left"></i> Trở về</button>
          </a>
          <a id="download"> <button type="button"  class="btn btn-primary" style="margin: 0 15px;">
            <i class="fas fa-download"></i> Lưu ảnh
            </button>
          </a>
          @foreach($orders as $order)
          <a href="{{ url('admin/orders/print/'.$order->id.'') }}"  id="print" rel="noopener" target="_blank">
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
     @foreach ($statuslist as $status)         
       <option  value="{{$status->id}}"                    
       @if ($order->status_id == $status->id)                    
       {{"selected"}}
       @endif                
       >{{$status->name}}</option>            
     @endforeach
    </select>
    <a rel="noopener" target="_blank">
      <button onclick="StatusChange({{$order->id}})" style="width:150px; margin-left:10px" type="button" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật</button>
    </a>
    @endforeach
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
            @foreach($orders as $order)
            <i class="fas fa-globe"></i> Furniture Store   
            <small class="float-right">Mã hóa đơn: # {{$order->id}} - Ngày lập: {{ date("m-d-Y", strtotime($order->date))}}
            </small>
            @endforeach
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
            @foreach ($employees as $employee)
              @if ($employee->employee_id == null)
                Người lập đơn: {{""}}   
              @else
                Người lập đơn: {{$employee->employee->name}}   
              @endif                       
            @endforeach    
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-6 invoice-col">
          Người mua:
          <address>
          @foreach($customers as $customer)
            <strong>{{$customer->customer->name}}</strong><br>
            Số điện thoại: {{$customer->customer->phone_number}}<br>
            Địa chỉ: {{$customer->customer->address}}<br>
            Email: {{$customer->customer->email}}                  
          @endforeach
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
            {{-- <th>ID sản phẩm</th> --}}
            <th>Tên sản phẩm</th>            
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>
        </tr>
        </thead>
          <tbody>
            {{-- Khởi tạo vòng lập foreach lấy giá trị vào bảng--}}
            <?php 
            $key=1;
            $cod = 0;
            $sum = 0;
            $count = 0;
             ?>
              @foreach($orders as $order)
                @foreach ($order->products as $product)                 
                  <tr style="text-align: center">
                    <td>{{ $key++ }}</td>
                    {{-- <td>{{ $product->id }}</td> --}}
                    <td >{{ $product->name }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td >{{ number_format($product->pivot->price, 0, ',', '.')}} VND</td>
                    <td >{{ number_format($product->pivot->price*$product->pivot->quantity, 0, ',', '.')}} VND</td>
                    <?php 
                      $sum += $product->pivot->price*$product->pivot->quantity;
                      $count += $product->pivot->quantity ;                    
                    ?>
                @endforeach                                            
                {{-- Kết thúc vòng lập foreach --}}
              @endforeach
             
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
          @foreach($orders as $order)    
            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">{{$order->note}}</p>          
          <p class="lead">Phương thức thanh toán:</p>           
            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">{{$order->payment}}</p>
          @endforeach
        </div>        
        <!-- /.col -->
    
        <div class="col-6">
          @foreach($orders as $order)
          <p class="lead">Ngày thanh toán: {{ date("m-d-Y", strtotime($order->date))}} </p>
          <div class="table-responsive">
            <table class="table">
              <tbody>
              <tr>
                <th style="width:50%">Tổng tiền hàng:</th>
                <td>{{number_format($sum, 0, ',', '.')}} VND</td>
              </tr>
              <tr>
                <th style="width:50%">Tổng số lượng hàng:</th>
                <td>{{$count}} Cái</td>
              </tr>
              {{-- <tr>
                <th>Phí vận chuyển:</th>
                <td>{{number_format($cod, 0, ',', '.')}} VND</td>
              </tr> --}}
              <tr>
                <th>Tổng cộng tiền thanh toán:</th>
                <td>{{number_format($order->total, 0, ',', '.')}} VND</td>
              </tr>
              @endforeach
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
@endsection
@section('handle')
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
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
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
@endsection

