@extends('layouts.users')
@section('contents')
<div class="container mt-3">
        <div class="row">
            <div class="col">
                    @foreach ($colors as $color)
                    {{-- @foreach ($products_image as $product_image)
                        @if($product->id==$product_image->id) --}}
                            <div class="row mt-5 text-dark" style="min-height:700px;">
                                <div class="col-6" >
                                    {{-- {{$color->product->name}} --}}
                                    <img src="{{asset('uploads/product_image/'.$color->image)}}" id="img-preview" class="img-thumbnail"/>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2>{{$color->product->name}}</h2>
                                            {{-- <h2 class="text-dark">{{$product->name}}</h2> --}}
                                            <hr style="border: 1px solid black;">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-3">
                                            <span>Code</span>
                                        </div>
                                        <div class="col-lg-6">
                                            <span>{{$color->product->code}}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-3">
                                            <span>Price</span>
                                        </div>
                                        <div class="col-lg-6">
                                            <span>{{$color->product->price}} USD</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-3">
                                            <span>Brand</span>
                                        </div>
                                        <div class="col-lg-6">
                                            <span>{{$color->product->brand}}</span>
                                        </div>
                                    </div>
                                    <form action="{{route('product.addtocart',$color->product->id)}}" method="post">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-lg-3">
                                                <span>Color</span>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="radio-toolbar">
                                                    @foreach ($productColors as $productColor)
                                                    <input type="radio" id="productColor{{$loop->iteration}}" name="productColor" style="display:none;" value="{{$productColor->image}}">
                                                        <label for="productColor{{$loop->iteration}}">
                                                            <img src="{{asset('uploads/product_image/'.$productColor->image)}}" onclick="changeImage('{{$productColor->image}}')" alt="{{$productColor->color}}" style="width:50px;"/>
                                                        </label>
                                                    @endforeach
                                                </div>
                                                {{-- @foreach ($products_image_color as $product_image_color )
                                                    @if($product->id==$product_image_color->id)
                                                        <img src="{{asset('uploads/product_image/'.$product_image_color->image)}}" onclick="changeImage('{{$product_image_color->image}}')" alt="{{$product_image_color->color}}" style="width:50px;"/>
                                                    @endif
                                                @endforeach --}}
                                            </div>
                                        </div>
                                        @if(count($sizes)>0)
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <span>Size</span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="radio-toolbar">
                                                        @foreach ($sizes as $size)
                                                            <input type="radio" id="productSize{{$loop->iteration}}" name="productSize" value="{{$size->size}}">
                                                            <label for="productSize{{$loop->iteration}}">{{$size->size}}</label>
                                                        @endforeach
                                                    </div>
                                                        {{-- <button class="mr-2 btn">{{$size->size}}</button> --}}
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row mb-3 align-items-center">
                                            <div class="col-lg-3">
                                                <span>Quantity</span>
                                            </div>
                                            <div class="col-lg-4 input-group">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quantity">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </span>
                                                <input style="max-height:30px;text-align:center;" type="text" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quantity">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row mb-3 mt-5">
                                            <div class="col-lg-4 ml-5">
                                                <button class="btn btn-info"><i class="far fa-credit-card"></i> Buy Now</button>
                                            </div>
                                            <div class="col-lg-4">
                                                @auth()
                                                    <button type="submit" class="btn btn-info text-white"><i class="fas fa-shopping-cart"></i> Add To Cart</button>
                                                @endauth
                                                @guest()
                                                    <a href="{{route('login')}}" class="btn btn-info text-white"><i class="fas fa-shopping-cart"></i> Add To Cart</a>
                                                @endguest
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    {{-- @endif --}}
                @endforeach
            </div>
        </div>
    </div>
@endsection

<script>
    function changeImage(img){
        document.getElementById("img-preview").src=`/uploads/product_image/${img}`;
    }
</script>
