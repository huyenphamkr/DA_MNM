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
  <div class="row">
    <div class="col-md-12"> 
      <div class="card card-primary mt-3">
        <div class="card-header">
          <h3 class="card-title">{{$title}}</h3>
        </div>
       
          {{-- <h3 class="card-title">Biểu đồ tròn</h3>
        <div class="card-body">
          <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div> --}}
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
                          @foreach($users as $key => $user)
                            <tr class="odd" style="text-align: center">
                              <td>{{ $key+1}}</td>
                              <td class="sorting_1 dtr-control">{{ $user->user_id }}</td>
                              @foreach ($listUser as $item)
                              @if ($item->id === $user->user_id)
                              <td style="text-align: left">{{ $item->name}}</td>                                
                              @endif
                              @endforeach
                              
                              <td>{{ $user->totalOrder}}</td>
                              <td>{{ number_format($user->totalPrice, 0, ',', '.')}} VND</td> 
                            </tr>
                            @endforeach
                          </tbody>              
                    </table>
                </div>       
            </div>
        </div>
      </div>
       {{-- <!-- PIE CHART -->
       <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Biểu đồ tròn</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card --> --}}
  </div>
</body>
</html>
