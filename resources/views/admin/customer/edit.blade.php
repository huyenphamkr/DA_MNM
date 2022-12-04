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
          {{-- {{ url('/users/add') }} --}}
          <div class="card-body">
          <div class="form-group">
              <label for="user">Tên Người Dùng</label>
              <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="user" placeholder="Nhập tên người dùng">
            </div>
            <div class="form-group">
              <label for="user">Email</label>
              <input type="text" name="email" value="{{ $user->email }}" class="form-control" id="user" placeholder="Nhập emaik">
            </div>
            <div class="form-group">
              <label for="user">Quyền</label>
              <input type="text" name="role" value="{{ $user->role_id }}" class="form-control" id="user" placeholder="Nhập quyền">
            </div>
            <div class="form-group">
              <label for="user">Địa chỉ</label>
              <input type="text" name="address" value="{{ $user->address }}" class="form-control" id="user" placeholder="Nhập địa chỉ">
            </div>
            <div class="form-group">
              <label for="user">Số điện thoại</label>
              <input type="text" name="phone_number" value="{{ $user->phone_number }}" class="form-control" id="user" placeholder="Nhập sđt ">
            </div>
            <div class="form-group clearfix">
              <label>Giới tính</label>
              <div class="icheck-success">
                <input type="radio" value="Nam" type="radio" id="male" name="gender" {{ (($user->gender) == "Nam") ? 'checked' : ""; }}>
                <label for="male">Nam</label>
              </div>
              <div class="icheck-success">
                <input type="radio"  value="Nữ" type="radio" id="female" name="gender" {{ (($user->gender) == "Nữ") ? 'checked' : ""; }}>
                <label for="female">Nữ</label>
              </div>
            </div>
            <div class="form-group clearfix">
              <label>Kích hoạt </label>
              <div class="icheck-success">
                <input type="radio" value="1" type="radio" id="active" name="active" {{ (($user->active) == "1") ? 'checked' : ""; }}>
                <label for="active">Có</label>
              </div>
              <div class="icheck-danger">
                <input type="radio"  value="0" type="radio" id="no_active" name="active" {{ (($user->active) == "0") ? 'checked' : ""; }}>
                <label for="no_active">Không</label>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Người Dùng</button>
          </div>
          @csrf
        </form>
    </div>
  </div>
  <!--/.col (left) -->
</div>
<!-- /.row -->
@endsection