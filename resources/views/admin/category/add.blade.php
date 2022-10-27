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
          {{-- {{ url('/category/add') }} --}}
          <div class="card-body">
            <div class="form-group">
              <label for="category">Tên danh mục</label>
              <input type="text" name="name" class="form-control" id="category" placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
              <label for="category">Mô tả</label>
              <textarea type="text" name="description" id="category" class="form-control ckeditor" placeholder="Nhập mô tả danh mục"></textarea>
            </div>

            
            <div class="form-group clearfix">
              <label>Kích hoạt </label>
              <div class="icheck-success">
                <input type="radio" value="1" type="radio" id="active" name="active" checked="">
                <label for="active">Có</label>
              </div>
              <div class="icheck-danger">
                <input type="radio"  value="0" type="radio" id="no_active" name="active">
                <label for="no_active">Không</label>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo Danh Mục</button>
          </div>
          @csrf
        </form>
   </div>
  </div>
<!--/.col (left) -->
</div>
<!-- /.row -->
@endsection