@extends('admin.main')

@section('content')

<form action="">
  
  {{-- <div class="row">
    <div class="col-md-2">
      <div class="form-group">
          <label>Sắp xếp sản phẩm:</label>
          <select class="form-control custom-select"  style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true">
              <option selected="" data-select2-id="5">Tăng dần</option>
              <option data-select2-id="21">Giảm dần</option>
          </select>
        </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
          <label>Danh mục:</label>                 
          <select class="form-control custom-select"  style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true">
            <option selected="" data-select2-id="5">Chọn danh mục</option>
              @foreach ($categories as $category)                
                <option value="{{$category->id}}" data-select2-id="21">{{$category->name}}</option>
              @endforeach
          </select>          
        </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
          <label>Kích hoạt:</label>
          <select class="form-control custom-select"  style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true">
            <option selected="" data-select2-id="5">Chọn kích hoạt</option>
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
        </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
          <label>Giá từ:</label>
          <div class="form-group">
            <input type="search" name="key" class="form-control" placeholder="Nhập giá cần tìm vào đây" value="">
          </div>
        </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
          <div class="form-group">
            <label>đến:</label>
            <input type="search" name="key" class="form-control" placeholder="Nhập giá cần tìm vào đây" value="">
          </div>
        </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
          <div class="form-group">
            <label>Số lượng lớn hơn:</label>
            <input type="number" name="key" class="form-control" placeholder="Nhập giá cần tìm vào đây" value="">
          </div>
        </div>
    </div>

  </div> --}}
  {{-- <div class="row">
    <label>Giá:</label>
    <div class="col-md-2">
      <div class="form-group">
        <input type="search" name="key" class="form-control" placeholder="Nhập giá cần tìm vào đây" value="">
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
          <input type="search" name="key" class="form-control" placeholder="Nhập từ khóa cần tìm vào đây" value="">
        </div>
    </div>
  </div> --}}

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
            <th style="width:140px">Tên sản phẩm</th>
            <th>Danh Mục</th>
            <th>Mô tả</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Kích hoạt</th>
            {{-- <th>Cập nhật</th> --}}
            <th style="width:100px">Chức năng</th>
        </tr>
        </thead>
          <tbody>
            {{-- Khởi tạo vòng lập foreach lấy giá trị vào bảng--}}
              @foreach($products as $key => $product)
                <tr>
                  <td style="text-align: center">{{ $key+1 }}</td>
                  <td style="text-align: center">{{ $product->id }}</td>
                  <td  style="text-align: center">
                    <p>{{ $product->name}}</p>
                      <img src="{{asset($product->image)}}" alt="" style="width:80px; height:50px"> 
                  </td>                        
                  <td>{{ $product->category->name }}</td>
                  <td>{{ $product->description }}</td>
                  <td style="text-align: center"> {{ $product->amount }}</td>
                  <td>{{ number_format($product->price, 0, ',', '.')}} VND</td>
                  <td style="text-align: center">
                    @if ($product->active == 0)
                      <span class = "btn btn-danger btn-xs">Không</span>
                    @else
                      <span class = "btn btn-success btn-xs">Có</span>
                    @endif 
                  </td>
                  {{-- <td>{{ $product->updated_at}}</td>   --}}
                  <td style="text-align: center">
                    <a class="btn btn-primary btn-sm" href="{{ url('admin/product/edit/'.$product->id.'') }}">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="{{ url('admin/product/destroy/'.$product->id.'') }}">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
                {{-- Kết thúc vòng lập foreach --}}
              @endforeach
          </tbody>
      </table>
      {{-- Phân trang --}}
      {!! $products->appends(request()->all())->links('vendor.pagination.bootstrap-5') !!}
    </div>
  </div>
<!--/.col (left) -->
</div>
<!-- /.row -->
@endsection