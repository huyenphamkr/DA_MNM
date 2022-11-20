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

      <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
        <thead>
          <tr style="text-align: center">
            <th>#</th>
            <th>ID</th>
            <th>Tên slide</th>
            <th style="width:300px;">Hình ảnh</th>
            <th>Mô tả</th>
            <th style="width:100px;">Link</th>
            <th>Kích hoạt</th>
            <th>Cập nhật</th>
            <th style="width:100px">Chức năng</th>
        </tr>
        </thead>
          <tbody>
            {{-- Khởi tạo vòng lập foreach lấy giá trị vào bảng--}}
              @foreach($slides as $key => $slide)
                <tr>
                  <td style="text-align: center">{{ $key+1 }}</td>
                  <td style="text-align: center">{{ $slide->id }}</td>
                  <td style="text-align: center">{{ $slide->name}}</td>
                  <td>
                      <img src="{{asset($slide->image)}}" alt="" style="width:300px; height:100px"> 
                  </td>        
                  <td>{{ $slide->description }}</td>
                  <td> {{ $slide->link }}</td>
                  <td style="text-align: center">
                    @if ($slide->active == 0)
                      <span class = "btn btn-danger btn-xs">Không</span>
                    @else
                      <span class = "btn btn-success btn-xs">Có</span>
                    @endif 
                  </td>
                  <td>{{ $slide->updated_at}}</td>  
                  <td style="text-align: center">
                    <a class="btn btn-primary btn-xs" href="{{ url('admin/slide/edit/'.$slide->id.'') }}">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-xs" href="{{ url('admin/slide/destroy/'.$slide->id.'') }}">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
                {{-- Kết thúc vòng lập foreach --}}
              @endforeach
          </tbody>
      </table>
      {{-- Phân trang --}}
      {!! $slides->links('vendor.pagination.bootstrap-5') !!}
    </div>
  </div>
<!--/.col (left) -->
</div>
<!-- /.row -->
@endsection