@extends('admin.main')

@section('content')
<div class="row">
  <div class="col-4">
    <div class="input-group" style="margin: 10px 0px;">
      <label style="width:150px; margin-top:5px">Trạng thái đơn hàng : </label>
      <select onchange="StatusChange()" id="status" name="status"  class="custom-select">
        <option value="" selected>---Chọn trạng thái cần lọc---</option>
       @foreach ($statuslist as $status)         
         <option  value="{{$status->id}}">{{$status->name}}</option>            
       @endforeach
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
        <h3 class="card-title">{{$title}}</h3>
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
            {{-- Khởi tạo vòng lập foreach lấy giá trị vào bảng--}}
              @foreach($orderslist as $key => $orders)
                <tr style="text-align: center">
                  <td>{{ $key+1 }}</td>
                  <td>{{ $orders->id }}</td>
                  <td style="text-align: left">{{ $orders->customer->name }}</td>
                  <td style="text-align: left">
                    @if ($orders->employee_id == null)
                       {{" "}}
                    @else
                      {{ $orders->employee->name }}
                    @endif                    
                  </td>        
                  <td>{{date_format(date_create($orders->date),"d/m/Y")}}</td> 
                  <td>{{date_format(date_create($orders->date),"H:i:s")}}</td> 
                  <td>{{ number_format($orders->total, 0, ',', '.')}} VND</td>
                  <?php $arr = array(1 => "warning",2 => "info",3 => "info",4 => "info",5 => "success",6 => "danger");?>
                  <td>
                    @if ($orders->status->id == 1)
                    <span style="color: black; font-size: 1rem" class="badge badge-warning">{{$orders->status->name}}</span>      
                    @else
                    <span style="font-size: 1rem" class="badge badge-{{$arr[$orders->status->id]}}">{{$orders->status->name}}</span>       
                  @endif                  
                  </td>
                  <td >
                    <a class="btn btn-primary btn-sm" href="{{ url('admin/orders/show/'.$orders->id.'') }}">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" target="_blank"  href="{{ url('admin/orders/print/'.$orders->id.'') }}" style="background-color: green; border-color: green;">
                      <i class="fas fa-print"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
          </tbody>
      </table>
      {{-- Phân trang --}}

      {!! $orderslist->appends(request()->all())->links('vendor.pagination.default') !!}
    </div>
  </div>
<!--/.col (left) -->
</div>
<!-- /.row -->
@endsection
@section('handle')
<script>

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
  }
});

const color =["warning", "info", "info", "info", "success", "danger"];
$(document).ready(function() {

  $("#show").on('change', function(){
    var $show = document.getElementById("show").value;
  $.ajax({
    url: "{{route('filter')}}",
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
    url: "{{route('filter')}}",
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
    url: "{{route('filter')}}",
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
@endsection

