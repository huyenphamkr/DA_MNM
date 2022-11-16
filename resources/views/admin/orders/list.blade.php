@extends('admin.main')

@section('content')

<form action="">
  <div class="form-group" style="margin-top: 15px">
    <div class="input-group input-group-lg">
        <input type="search" name="key" class="form-control" placeholder="Nhập từ khóa cần tìm vào đây" value="">
        <div class="input-group-append">
            <button type="submit" class="btn btn-lg btn-primary">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
  </div>
</form>

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
                        {{""}}
                    @else
                      {{ $orders->employee->name }}
                    @endif                    
                  </td>
                  <td>{{ $orders->date }}</td>
                  <td>{{ number_format($orders->total, 0, ',', '.')}} VND</td>
                <td>
                  <select onchange="StatusChange({{$orders->id}})"
                    name="category" id="status" class="custom-select bg-primary" style="width:192px">               
                  @foreach ($statuslist as $key => $status)         
                    <option class="bg-primary"
                    @if ($orders->status->id == $status->id)
                    {{"selected"}}                    
                    @endif                
                    value="{{$status->id}}">{{$status->name}}</option>            
                  @endforeach
                </select>  
              </td>
                  <td >
                    <a class="btn btn-primary btn-sm" href="{{ url('admin/orders/show/'.$orders->id.'') }}">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-primary btn-sm"  href="{{ url('admin/orders/print/'.$orders->id.'') }}" style="background-color: green; border-color: green;">
                      <i class="fas fa-print"></i>
                    </a>
                  </td>
                </tr>
                {{-- Kết thúc vòng lập foreach --}}
              @endforeach
          </tbody>
      </table>
      {{-- Phân trang --}}

      {!! $orderslist->appends(request()->all())->links('vendor.pagination.bootstrap-5') !!}
    </div>
  </div>
<!--/.col (left) -->
</div>
<!-- /.row -->
@endsection
@section('handle')

@endsection