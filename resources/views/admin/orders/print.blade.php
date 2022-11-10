@include('admin.head')
<!DOCTYPE html>
<html>
<head>
  <style>
    body{
      background-color: white;
    }
  </style>
  <script type="text/javascript">
   window.addEventListener("load", window.print());  
  </script>
</head> 
<body>
  <div class="row" id="exportBillToImage">
    <div class="col-12">
      <!-- Main content -->
      <div class="invoice p-3 mb-3" style="margin-top: 15px">
        <!-- title row -->
        <div class="row">
          <div class="col-12">
            <h4>
              @foreach($orders as $order)
              <i class="fas fa-globe"></i> Furniture Store            
              <small class="float-right">Mã hóa đơn: # {{$order->id}} - Ngày lập: {{ date("m-d-Y", strtotime($order->date))}}</small>
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
              $cod = 30000;
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
            <p class="lead">Ghi chú: phương</p>
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
                <tr>
                  <th>Phí vận chuyển:</th>
                  <td>{{number_format($cod, 0, ',', '.')}} VND</td>
                </tr>
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
    </div><!-- /.col -->
  </div>
</body>
</html>
