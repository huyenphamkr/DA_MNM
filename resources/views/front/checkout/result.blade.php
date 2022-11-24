@extends('front.layout.master')

@Section('title', 'Kết quả đặt hàng')

@Section('body')

<!-- Section Begin -->
<section class="checkout-section spad">
    <div class="container">
        
        <div class="row">        
            <div class="col-lg-12">
                <h4>
                    {{ $notification }}
                </h4> 
                
                <a href="{{route('shop')}}" class="primary-btn mt-5">Tiếp tục mua sắm</a>
            </div>                
        </div>
           
    </div>
</section>

<!--  Section End -->

@endsection


