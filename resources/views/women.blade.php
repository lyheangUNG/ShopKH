@extends('layouts.users')
@section('contents')
@foreach ($categories as $category)
<div class="popular-product-area wrapper-padding-3 pt-115 pb-0">
        <div class="container-fluid">

            <div class="section-title-6 mb-50">
                <h3><span style="background: red;color:white;padding:10px;">{{$category->category_name}}</span></h3>
                <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p> -->
            </div>

            <div class="product-style">
                <div class="popular-product-active owl-carousel">
                    @foreach ($products as $product)
                        @if ($product->category_id == $category->id)
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
                        @endif
                   @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
