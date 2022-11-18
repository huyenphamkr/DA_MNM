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
  <div class="row" id = "exportBillToImage">
    <div class="col-12">
      <div class="invoice p-3 mb-3">
        <div class="row">
          <div class="col-12">
            <h4>
              @foreach($purchases as $purchase)
              <i class="fas fa-globe"></i> Furniture Store   
              <small class="float-right">Mã phiếu nhập: # {{$purchase->id}} - Ngày lập: {{ date("m-d-Y", strtotime($purchase->date))}}
              </small>
              @endforeach
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
              @foreach ($employees as $employee)
                  Người lập đơn:{{$employee->user->name}}                        
              @endforeach    
            </address>
          </div>
          <div class="col-sm-6 invoice-col">
            Người bán:
            <address>
            @foreach($suppliers as $supplier)
              <strong>{{$supplier->supplier->name}}</strong><br>
              Số điện thoại: {{$supplier->supplier->phone_number}}<br>
              Địa chỉ: {{$supplier->supplier->address}}<br>
              Email: {{$supplier->supplier->email}}                  
            @endforeach
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
                @foreach($purchases as $purchase)
                  @foreach ($purchase->products as $product)                 
                    <tr style="text-align: center">
                      <td>{{ $key++ }}</td>
                      <td >{{ $product->name }}</td>
                      <td>{{ $product->pivot->quantity }}</td>
                      <td >{{ number_format($product->pivot->price, 0, ',', '.')}} VND</td>
                      <td >{{ number_format($product->pivot->price*$product->pivot->quantity, 0, ',', '.')}} VND</td>
                      <?php 
                        $sum += $product->pivot->price*$product->pivot->quantity;
                        $count += $product->pivot->quantity ;                    
                      ?>
                  @endforeach   
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <p class="lead">Ghi chú:</p>  
            @foreach($purchases as $purchase)    
              <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">{{$purchase->note}}</p>          
            <p class="lead">Phương thức thanh toán:</p>           
              <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">{{$purchase->payment}}</p>
            @endforeach
          </div>        
          <div class="col-6">
            @foreach($purchases as $purchase)
            <p class="lead">Ngày thanh toán: {{ date("m-d-Y", strtotime($purchase->date))}} </p>
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
                  <td>{{number_format($purchase->total, 0, ',', '.')}} VND</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
          </div>
        </div>    
      </div>
    </div>
  </div>
</body>
</html>
