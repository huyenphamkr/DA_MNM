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

      <form action="" method="POST" enctype="multipart/form-data">
          {{-- {{ url('/product/add') }} --}}
          <div class="card-body">
            <div class="row">

             
              <div class="form-group">
                <label for="slide">Tên slide</label>
                <input type="text" name="name" class="form-control" id="slide" placeholder="Nhập tên slide">
              </div>  

              <div class="form-group">
                <label for="slide">Link</label>
                <input type="text" name="link" class="form-control" id="slide" placeholder="Nhập link">
              </div>  

              <div class="form-group">
                <label for="imageslide">Hình ảnh</label>
                <input type="file" name="fileimage" class="form-control" id="imageslide">
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
            
              <div class="form-group">
                <label for="slide">Mô tả</label>        
                <textarea type="text" name="description" id="demo" class="form-control ckeditor" placeholder="Nhập mô tả slide"></textarea>
              </div>
            </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo slide</button>
          </div>
          @csrf
        </form>
    </div>
  </div>
<!--/.col (left) -->
</div>
<!-- /.row -->
@endsection