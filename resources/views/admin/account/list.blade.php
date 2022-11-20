@extends('admin.main')

@section('content')
<div class="row">
  <div class="col-md-12"> 
    <div class="card card-primary mt-3">
      <div class="card-header">
        <h3 class="card-title">{{$title}}</h3>
      </div>
      <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
              <div class="col-sm-12">
                  <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                      <thead>
                        <tr role="row" style="text-align: center">                              
                          <th>Stt</th>
                          <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">ID</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Tên người dùng</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Quyền</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Email</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Địa chỉ</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Số điện thoại</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Giới tính</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Kích hoạt</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Chức năng</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $key => $user)
                          <tr class="odd" style="text-align: center">
                            <td>{{ $key+1}}</td>
                            <td class="sorting_1 dtr-control">{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->gender}}</td>
                            <td style="text-align: center">
                                @if ($user->active == 0)
                                    <span class = "btn btn-danger btn-ms">Không</span>
                                @else
                                    <span class = "btn btn-success btn-ms">Có</span>
                                @endif 
                            </td>     
                            <td style="text-align: center;">
                                <a class="btn btn-primary btn-sm" href="{{ url('admin/account/edit/'.$user->id.'') }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>                
                          </tr>
                          @endforeach
                        </tbody>              
                  </table>
              </div>       
          </div>
      </div>
    </div>
</div>
@endsection

@section('handle')
<!-- DataTables  & Plugins -->
<script src="{{asset('template/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('template/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script> 
@endsection