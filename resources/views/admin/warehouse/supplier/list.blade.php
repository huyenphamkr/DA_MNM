@extends('admin.warehouse.main')

@section('content')

<form action="">
  {{-- <div class="row">
    <div class="col-md-3">
      <div class="form-group">
          <label>Sắp xếp Nhà Cung Cấp:</label>
          <select class="form-control custom-select"  style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true">
              <option selected="" data-select2-id="5">Tăng dần</option>
              <option data-select2-id="21">Giảm dần</option>
          </select>
        </div>
    </div>

    <div class="col-md-3">
      <div class="form-group">
          <label>Kích hoạt:</label>
          <select class="form-control custom-select"  style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true">
              <option selected="" data-select2-id="5">Tăng dần</option>
              <option data-select2-id="21">Giảm dần</option>
          </select>
        </div>
    </div>
  </div> --}}
  <div class="form-group" >
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
            <th>STT</th>
            <th>ID</th>
            <th style="width:140px">Tên Nhà Cung Cấp</th>
            <th>Địa chỉ</th>
            <th style="text-align: center">Số điện thoại</th>
            <th style="width:85px">Kích hoạt</th>
            {{-- <th>Cập nhật</th> --}}
            <th style="width:100px">Chức năng</th>
          </tr>
        </thead>
        <tbody>
      {{-- Khởi tạo vòng lập foreach lấy giá vào bảng?> --}}
          @foreach($suppliers as $key => $supplier)
        <tr>
          <td style="text-align: center">{{ $key+1 }}</td>
          <td style="text-align: center">{{ $supplier->id }}</td>
          <td>{{ $supplier->name }}</td>
              <td>{{ $supplier->address }}</td>
              <td style="text-align: center">{{ $supplier->phone_number }}</td>
              <td style="text-align: center">
              @if ($supplier->active == 0)
                  <span class = "btn btn-danger btn-ms">NO</span>
              @else
                  <span class = "btn btn-success btn-ms">YES</span>
              @endif 
              </td>     
              {{-- <td>{{ $supplier->updated_at}}</td> --}}
              <td style="text-align: center;">
                  <a class="btn btn-primary btn-sm" href="{{ url('admin/warehouse/supplier/edit/'.$supplier->id.'') }}">
                      <i class="fas fa-edit"></i>
                  </a>
                  <a class="btn btn-danger btn-sm" href="{{ url('admin/warehouse/supplier/destroy/'.$supplier->id.'') }}">
                      <i class="fas fa-trash"></i>
                  </a>
              </td>
          </tr>
      {{-- Kết thúc vòng lập foreach --}}
        @endforeach 
        </tbody>
      </table>
      {!! $suppliers->links('vendor.pagination.bootstrap-5') !!}
    </div>
  </div>
<!--/.col (left) -->
</div>
<!-- /.row -->
@endsection