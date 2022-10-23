@extends('admin.main')

@section('content')
<table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
  <thead>
    <tr style="text-align: center">
      <th>STT</th>
      <th>ID</th>
      <th style="width:140px">Tên danh mục</th>
      <th>Mô tả</th>
      <th style="width:77px">Kích hoạt</th>
      <th>Cập nhật</th>
      <th style="width:86px">Chức năng</th>
  </tr>
  </thead>
    <tbody>

{{-- Khởi tạo vòng lập foreach lấy giá trị vào bảng --}}
	@foreach($category as $key => $category)
    	<tr>
			<td>{{ $key+1 }}</td>
			<td>{{ $category->id }}</td>
			<td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td style="text-align: center">
                @if ($category->active == 0)
                    <span class = "btn btn-danger btn-xs">NO</span>
                @else
                    <span class = "btn btn-success btn-xs">YES</span>
               @endif 
            </td>       
            <td>{{ $category->updated_at}}</td>
			<td>
                <a class="btn btn-primary btn-sm" href="{{ url('admin/category/edit/'.$category->id.'') }}">
                    <i class="fas fa-edit"></i>
                </a>
                <a class="btn btn-danger btn-sm" href="{{ url('admin/category/destroy/'.$category->id.'') }}">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
		</tr>
{{-- Kết thúc vòng lập foreach? --}}
	@endforeach

    </tbody>
</table>
<div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
    </div>
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            <ul class="pagination">
                <li class="paginate_button page-item previous disabled" id="example2_previous">
                    <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                </li>
                <li class="paginate_button page-item active">
                    <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                </li>
                <li class="paginate_button page-item ">
                    <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                </li>
                <li class="paginate_button page-item ">
                    <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                </li>
                <li class="paginate_button page-item ">
                    <a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                </li>
                <li class="paginate_button page-item ">
                    <a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                </li>
                <li class="paginate_button page-item ">
                    <a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                </li>
                <li class="paginate_button page-item next" id="example2_next">
                    <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                </li>
            </ul>
        </div>
    </div>
</div>

</div>
    </div>
    <!-- /.card-body -->
  </div>

@endsection
