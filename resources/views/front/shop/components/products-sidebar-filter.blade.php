<form action="shop">
    <div class="filter-widget">
        <h4 class="fw-title">Danh mục sản phẩm</h4>
        <ul class="filter-catagories">

            @foreach($categories as $category)
                <li><a href="{{url('shop/category/'.$category->name.'')}}">{{ $category->name }}</a></li>
            @endforeach

        </ul>
    </div>
</form>