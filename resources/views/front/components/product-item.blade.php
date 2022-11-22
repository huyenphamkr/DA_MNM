<div class="product-item item">        
    <div class="pi-pic">
        <img src="{{asset($product->image)}}" alt="" style="height:250px">
                    
                    
        <div class="icon">
            <i class="icon_heart_alt"></i>
        </div>
        <ul>
            {{-- cấu hình nút add to cart --}}
            <li class="w-icon active"><a href="javascript:addCart({{$product->id}})"><i class="icon_bag_alt"></i></a></li>
            <li class="quick-view"><a href="{{url('shop/product/'.$product->id.'')}}">+ Xem thêm</a></li>
            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
        </ul>
    </div>
    <div class="pi-text">
        <div class="category-name">{{ $product->category->name }}</div>
        <a href="{{url('shop/product/'.$product->id.'')}}">
            <h5>{{$product->name}}</h5>
        </a>
        <div class="product-price">
            {{number_format($product->price, 0, ',', '.')}} VND
        </div>
    </div>
</div>