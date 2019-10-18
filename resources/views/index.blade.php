@extends('layouts.users')
@section('contents')
<div class="slider-area">
    <div class="slider-active owl-carousel">
        @foreach ($ads as $ad)
        <div class="single-slider-4 slider-height-6 bg-img" style="background-image: url({{asset('uploads/ads/'.$ad->image)}})">
            {{-- <div class="container">
                <div class="row">
                    <div class="ml-auto col-lg-6">
                        <div class="furniture-content fadeinup-animated">
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        @endforeach
    </div>
</div>
<!-- new arrival product area start -->
<div class="popular-product-area wrapper-padding-3 pt-115 pb-0">
    <div class="container-fluid">
        <div class="section-title-6 text-center mb-50">
            <h2>New Arrival</h2>
            <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p> -->
        </div>
        <div class="product-style">
            <div class="popular-product-active owl-carousel">
                @foreach ($products as $product)
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="{{route('products.page',$product->id)}}">
                                @foreach ($products_image as $product_image)
                                    @if($product->id==$product_image->id)
                                        <img src="{{asset('uploads/product_image/'.$product_image->image)}}" alt="">
                                    @endif
                                @endforeach
                            </a>
                            <div class="product-action">
                                <a class="animate-left" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="animate-top" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="animate-right" title="Quick View" href="{{route('products.page',$product->id)}}">
                                    <i class="pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="funiture-product-content text-center">
                            <h4><a href="product-details.html">{{$product->code}}</a></h4>
                            <span>{{$product->price}} USD</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- new arrival product area end -->
<!-- popular product area start -->
<div class="popular-product-area wrapper-padding-3 pt-115 pb-115">
    <div class="container-fluid">
        <div class="section-title-6 text-center mb-50">
            <h2>Popular Product</h2>
            <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p> -->
        </div>
        <div class="product-style">
            <div class="popular-product-active owl-carousel">
                @foreach ($products as $product)
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="{{route('products.page',$product->id)}}">
                                @foreach ($products_image as $product_image)
                                    @if($product->id==$product_image->id)
                                        <img src="{{asset('uploads/product_image/'.$product_image->image)}}" alt="">
                                    @endif
                                @endforeach
                            </a>
                            <div class="product-action">
                                <a class="animate-left" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="animate-top" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="animate-right" title="Quick View" href="{{route('products.page',$product->id)}}">
                                    <i class="pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="funiture-product-content text-center">
                            <h4><a href="product-details.html">{{$product->code}}</a></h4>
                            <span>{{$product->price}} USD</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- popular product area end -->
@endsection
