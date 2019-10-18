@extends('layouts.app', ['title' => __('Product Management')])

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card bg-default shadow">
                        <div class="card-header bg-transparent border-0">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <h3 class="text-white mb-0">Products</h3>
                                </div>
                                <div class="col-8 text-right">
                                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-success">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                        @foreach ($products_image as $product_image)
                            @if($product->id==$product_image->id)
                                <div class="row mt-5 text-white" style="min-height:700px;">
                                    <div class="col-6 ml-7" >
                                        <img src="{{asset('uploads/product_image/'.$product_image->image)}}" id="img-preview" class="img-thumbnail"/>
                                    </div>
                                    <div class="col-5">
                                        <div class="row">
                                            <div class="col-8">
                                                <h2 class="text-white">{{$product->name}}</h2>
                                                <hr style="border: 1px solid white;">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-3">
                                                <span>Code</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <span>{{$product->code}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-3">
                                                <span>Price</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <span>{{$product->price}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-3">
                                                <span>Brand</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <span>{{$product->brand}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-3">
                                                    <span>Color</span>
                                            </div>
                                            <div class="col-lg-9">
                                                @foreach ($products_image_color as $product_image_color )
                                                    @if($product->id==$product_image_color->id)
                                                        <img src="{{asset('uploads/product_image/'.$product_image_color->image)}}" onclick="changeImage('{{$product_image_color->image}}')" alt="{{$product_image_color->color}}" style="width:50px;"/>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        @if(count($sizes)>0)
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <span>Size</span>
                                                </div>
                                                <div class="col-lg-6">
                                                    @foreach ($sizes as $size)
                                                        <span class="mr-2">{{$size->size}}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <script>
            function changeImage(img){
                document.getElementById("img-preview").src=`/uploads/product_image/${img}`;
            }
        // $(document).ready(function(e){
        //     $('#img-replace').click(function(){
        //         alert('hello');
        //         $img = $('#img-replace').attr('src');
        //         $('#img-preview').attr('src',$img);
        //     });
        // });
    </script>

        @include('layouts.footers.auth')
    </div>
@endsection




