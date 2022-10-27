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

              <div class="col-md-6">
                <div class="form-group">
                  <label for="product">Tên sản phẩm</label>
                  <input type="text" name="name" class="form-control" id="product" placeholder="Nhập tên sản phẩm" value="{{$product->name}}">
                </div>  
                <div class="form-group">
                  <label for="product">Giá</label>
                  <input type="number" name="price" class="form-control" id="product" placeholder="Nhập giá sản phẩm" value="{{$product->price}}">
                </div>  
              </div>
        
              <div class="col-md-6">
                <div class="form-group">
                  <label for="product">Danh mục</label>
                  <select name="category" id="" class="custom-select">
                    @foreach ($categories as $category)
                      <option 
                      @if ($product->category->id == $category->id)
                      {{"selected"}}                    
                      @endif                
                      value="{{$category->id}}">{{$category->name}}</option>            
                    @endforeach
                  </select>        
                </div> 

                <div class="form-group">
                  <label for="product">Số lượng</label>
                  <input type="number" name="amount" class="form-control" id="product" placeholder="Nhập số lượng sản phẩm" value="{{$product->amount}}">
                </div>  
              </div>
            </div>      

            <div class="form-group">
              <label for="imageProduct">Hình ảnh</label>
              <p>
                  <img src="{{asset($product->image)}}" alt="{{$product->name}}" style="width:300px">
              </p>
              <input type="file" name="fileimage" class="form-control" id="imageProduct">              
            </div>

            <div class="form-group clearfix">
              <label>Kích hoạt </label>
              <div class="icheck-success">
                <input type="radio" value="1" type="radio" id="active" name="active" {{ (($product->active) == "1") ? 'checked' : ""; }}>
                <label for="active">Có</label>
              </div>
              <div class="icheck-danger">
                <input type="radio"  value="0" type="radio" id="no_active" name="active" {{ (($product->active) == "0") ? 'checked' : ""; }}>
                <label for="no_active">Không</label>
              </div>
            </div>
            
            <div class="form-group">
              <label for="product">Mô tả</label>        
              <textarea type="text" name="description" id="demo" class="form-control ckeditor">{{$product->description}}</textarea>
            </div>
            
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
          </div>
          @csrf
        </form>           
    </div>
  </div>
<!--/.col (left) -->
</div>
<!-- /.row -->
@endsection
