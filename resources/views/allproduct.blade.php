@extends('layouts.users')
@section('contents')

<div class="container-fluid mt-4">
    <div class="row">
        @foreach($products as $product)
            @foreach ($colors as $color)
                @if($color->product_id == $product->id)
                    <div class="col-md-2 mt-3">
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="{{route('products.page',$color->product->id)}}">
                                    <img src="{{asset('uploads/product_image/'.$color->image)}}" alt="">
                                </a>
                                <div class="product-action">
                                    <a class="animate-left" title="Wishlist" href="#">
                                        <i class="pe-7s-like"></i>
                                    </a>
                                    <a class="animate-top" title="Add To Cart" href="#">
                                        <i class="pe-7s-cart"></i>
                                    </a>
                                    <a class="animate-right" title="Quick View" href="{{route('products.page',$color->product->id)}}">
                                        <i class="pe-7s-look"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="funiture-product-content text-center">
                                <h4>{{$color->product->code}}</h4>
                                <span>{{$color->product->price}} USD</span>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>

</div>


@endsection
