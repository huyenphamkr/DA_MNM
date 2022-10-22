@extends('admin.main')

@section('content')
<form action="" method="POST">
    {{-- {{ url('/category/add') }} --}}
    <div class="card-body">
      <div class="form-group">
        <label for="category">Tên danh mục</label>
        <input type="text" name="name" class="form-control" id="category" placeholder="Nhập tên danh mục">
      </div>

      <div class="form-group">
        <label for="category">Mô tả</label>
        <textarea type="text" name="description" class="form-control" id="category" placeholder="Nhập mô tả danh mục"></textarea>
      </div>

      {{-- <div class="form-group">
        <label for="exampleInputFile">Hình ảnh</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Upload</span>
          </div>
        </div>
      </div> --}}

      <div class="form-group">
        <label>Kích hoạt </label>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
          <label for="active" class="custom-control-label">Có</label>
        </div>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
          <label for="no_active" class="custom-control-label">Không</label>
        </div>
      </div>

      {{-- <div class="row">
        <label>Kích hoạt </label>
        <div class="col-sm-6">
            <div class="form-group">               
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" checked="">
                    <label for="customRadio1" class="custom-control-label">Có</label>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                    <label for="customRadio2" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
      </div> --}}
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Tạo Danh Mục</button>
    </div>
    @csrf
  </form>
@endsection