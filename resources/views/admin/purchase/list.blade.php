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
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nhân viên</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nhà cung cấp</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Ngày lập</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Giờ lập</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Tổng tiền</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Chức năng</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($purchases as $key => $purchase)
                          <tr class="odd" style="text-align: center">
                            <td>{{ $key+1}}</td>
                            <td class="sorting_1 dtr-control">{{ $purchase->id }}</td>
                            <td>{{ $purchase->user->name }}</td>
                            <td>{{ $purchase->supplier->name }}</td>
                            <td>{{date_format(date_create($purchase->date),"d/m/Y")}}</td>
                            <td>{{date_format(date_create($purchase->date),"H:i:s")}}</td>
                            <td>{{ number_format($purchase->total, 0, ',', '.')}} VND</td>
                            <td >
                              <a class="btn btn-primary btn-sm" href="{{ url('admin/purchase/show/'.$purchase->id.'') }}">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a class="btn btn-primary btn-sm"  href="{{ url('admin/purchase/print/'.$purchase->id.'') }}" target="_blank" style="background-color: green; border-color: green;">
                                <i class="fas fa-print"></i>
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
<script src="{{asset('adminstyle/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminstyle/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminstyle/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminstyle/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminstyle/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script> 
@endsection