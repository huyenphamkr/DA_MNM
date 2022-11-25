@extends('admin.main')

@section('content')
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
      <div class="form-group">
        <label>Thời gian:</label>
          <div class="input-group date" id="reservationdate" data-target-input="nearest">
              <input type="date" name="year" id="year" class="form-control datetimepicker-input" data-target="#reservationdate"
              value="{{$year}}">
              <a href="#">
                <button onclick="YearChange()" style="width:130px" type="button" class="btn btn-primary">Lọc</button>
              </a>
              <a href="#" id="print" target="_blank">
                <button style="margin-left: 10px; width:100px" type="button" class="btn btn-primary"><i class="fas fa-print"></i> In</button>
              </a>
          </div>      
      </div>
  </div>
  
</div>
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
@endsection

@section('handle')
<!-- ChartJS -->
{{-- <script src="{{asset('adminstyle/admin/plugins/chart.js/Chart.min.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{asset('adminstyle/admin/dist/js/pages/dashboard3.js')}}"></script> --}}
<!-- DataTables  & Plugins -->
<script src="{{asset('adminstyle/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminstyle/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminstyle/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminstyle/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminstyle/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script> 


<script>
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
  }
});

function Print()
{
  var $date = document.getElementById("year").value;
  d= new Date($date);
  $year = d.getFullYear();
  //alert($year);
  $.get("print", $year);
}

function YearChange() {    
  var $date = document.getElementById("year").value;
  d= new Date($date);
  $year = d.getFullYear();
  //alert(d.getFullYear());
  $.ajax({
    url: "{{route('vip')}}",
    method: "GET",
    data: {'year' : $year},      
    success: function(result) {  
      console.log(result);
      var listUser = result.listUser;
      var users = result.users;
      var html = '';
      if(users.length > 0)
      {
        for(let i=0; i<users.length;i++){
          html +='<tr class="odd" style="text-align: center">\
            <td>'+(i+1)+'</td>\
            <td class="sorting_1 dtr-control">'+ users[i]['user_id'] +'</td>';
            for(let j=0; j<listUser.length;j++){
              if(listUser[j]['id'] === users[i]['user_id'])
              {
                html += '<td style="text-align: left">'+ listUser[j]['name'] +'</td>';
              }
            }
          html +='<td> '+ users[i]['totalOrder'] +'</td>\
            <td>'+ new Intl.NumberFormat('it-IT', { style: 'currency', currency: 'VND' }).format(users[i]['totalPrice'])+ '</td>\
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

//biểu đồ
// $(function () {
// //-------------
//     //- PIE CHART -
//     //-------------
//     // Get context with jQuery - using jQuery's .get() method.
//     var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
//     var donutData = {
//       labels: [
//           'Chrome',
//           'IE',
//           'FireFox',
//           'Safari',
//           'Opera',
//           'Navigator',
//       ],
//       datasets: [
//         {
//           data: [700,500,400,600,300,100],
//           backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
//         }
//       ]
//     }
//     var pieData        = donutData;
//     var pieOptions     = {
//       maintainAspectRatio : false,
//       responsive : true,
//     }
//     //Create pie or douhnut chart
//     // You can switch between pie and douhnut using the method below.
//     new Chart(pieChartCanvas, {
//       type: 'pie',
//       data: pieData,
//       options: pieOptions
//     })
//   });

</script>
@endsection