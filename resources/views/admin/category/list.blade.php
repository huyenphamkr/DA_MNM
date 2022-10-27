@extends('admin.main')

@section('content')

<form action="">
  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
          <label>Sắp xếp danh mục:</label>
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
  </div>
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
            <th style="width:140px">Tên danh mục</th>
            <th>Mô tả</th>
            <th style="width:85px">Kích hoạt</th>
            <th>Cập nhật</th>
            <th style="width:100px">Chức năng</th>
          </tr>
        </thead>
        <tbody>
      {{-- Khởi tạo vòng lập foreach lấy giá vào bảng?> --}}
          @foreach($categories as $key => $category)
        <tr>
          <td style="text-align: center">{{ $key+1 }}</td>
          <td style="text-align: center">{{ $category->id }}</td>
          <td>{{ $category->name }}</td>
              <td>{{ $category->description }}</td>
              <td style="text-align: center">
              @if ($category->active == 0)
                  <span class = "btn btn-danger btn-ms">NO</span>
              @else
                  <span class = "btn btn-success btn-ms">YES</span>
              @endif 
              </td>     
              <td>{{ $category->updated_at}}</td>
              <td style="text-align: center;">
                  <a class="btn btn-primary btn-sm" href="{{ url('admin/category/edit/'.$category->id.'') }}">
                      <i class="fas fa-edit"></i>
                  </a>
                  <a class="btn btn-danger btn-sm" href="{{ url('admin/category/destroy/'.$category->id.'') }}">
                      <i class="fas fa-trash"></i>
                  </a>
              </td>
          </tr>
      {{-- Kết thúc vòng lập foreach --}}
        @endforeach 
        </tbody>
      </table>
      {!! $categories->links('vendor.pagination.bootstrap-5') !!}
    </div>
  </div>
<!--/.col (left) -->
</div>
<!-- /.row -->
@endsection