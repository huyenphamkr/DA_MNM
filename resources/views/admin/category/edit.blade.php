@extends('admin.main')

@section('content')
<form action="" method="POST">
    {{-- {{ url('/category/add') }} --}}
    <div class="card-body">
      <div class="form-group">
        <label for="category">Tên danh mục</label>
        <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="category" placeholder="Nhập tên danh mục">
      </div>

      <div class="form-group">
        <label for="category">Mô tả</label>
        <textarea type="text" name="description" class="form-control" id="category" placeholder="Nhập mô tả danh mục">{{ $category->description }}</textarea>
      </div>

      <div class="form-group">
        <label>Kích hoạt </label>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" value="1" type="radio" id="active" name="active" {{ (($category->active) == "1") ? 'checked' : ""; }}>
          <label for="active" class="custom-control-label">Có</label>
        </div>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" {{ (($category->active) == "0") ? 'checked' : ""; }}>
          <label for="no_active" class="custom-control-label">Không</label>
        </div>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Cập Nhật Danh Mục</button>
    </div>
    @csrf
  </form>
@endsection