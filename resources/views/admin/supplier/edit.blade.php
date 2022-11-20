@extends('admin.main')

@section('content')

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary mt-3">
      <div class="card-header">
        <h3 class="card-title">{{$title}}</h3>
      </div>

      <form action="" method="POST">
          {{-- {{ url('/supplier/add') }} --}}
          <div class="card-body">
            <div class="form-group">
              <label for="supplier">Tên Nhà Cung Cấp</label>
              <input type="text" name="name" value="{{ $supplier->name }}" class="form-control" id="supplier" placeholder="Nhập tên Nhà Cung Cấp">
            </div>

            <div class="form-group">
              <label for="supplier">Địa chỉ</label>
              <input type="text" name="address" id="supplier" class="form-control " placeholder="Nhập địa chỉ Nhà Cung Cấp" value="{{ $supplier->address }}">
            </div>

            <div class="form-group">
              <label for="supplier">Số điện thoại</label>
              <input type="text" name="phone_number" id="supplier" class="form-control " placeholder="Nhập sđt" value="{{ $supplier->phone_number }}">
            </div>

            <div class="form-group clearfix">
              <label>Kích hoạt </label>
              <div class="icheck-success">
                <input type="radio" value="1" type="radio" id="active" name="active" {{ (($supplier->active) == "1") ? 'checked' : ""; }}>
                <label for="active">Có</label>
              </div>
              <div class="icheck-danger">
                <input type="radio"  value="0" type="radio" id="no_active" name="active" {{ (($supplier->active) == "0") ? 'checked' : ""; }}>
                <label for="no_active">Không</label>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Nhà Cung Cấp</button>
          </div>
          @csrf
        </form>
    </div>
  </div>
  <!--/.col (left) -->
</div>
<!-- /.row -->
@endsection