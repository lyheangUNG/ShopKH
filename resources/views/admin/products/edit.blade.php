@extends('layouts.app', ['title' => __('Product Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Edit Product')])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Product Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <form method="post" action="{{ route('products.update', $product) }}" autocomplete="off"> --}}
                        {{-- <form method="post" action="{{ route('products.update',$product->id) }}" autocomplete="off" enctype="multipart/form-data"> --}}
                        <form method="post" action="{{ route('products.update',$product->id) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">{{ __('products information') }}</h6>
                            <div class="pl-lg-4">
                                {{-- <div class="form-group{{ $errors->has('Image') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-image">{{ __('Image') }}</label>
                                <input type="text" name="image" id="input-image" class="form-control form-control-alternative{{ $errors->has('image') ? ' is-invalid' : '' }}" placeholder="{{ __('Image URL') }}" value="{{$product->image}}" required autofocus>

                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div> --}}
                                {{-- get url parameter --}}
                                <input type="hidden" value="{{app('request')->input('page')}}" name="page">
                                {{-- upload img --}}
                                {{-- <div class="form-group">
                                    <label class="form-control-label" for="input-code">{{ __('Upload Image') }}</label>
                                    <input type="hidden" id=imgDB name="imgDB" value="{{$product->image}}">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                Browse… <input type="file" id="imgInp" name="image">
                                            </span>
                                            <div>{{$errors->first('image')}}</div>
                                        </span>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                    <br>
                                    <img src="{{asset( 'uploads/product_image/' . $product->image )}}" id='img-upload' class="img-thumbnail rounded mx-auto d-block"/>
                                </div> --}}
                                {{-- code and name input --}}
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                         <div class="form-group{{ $errors->has('code') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-code">{{ __('Code') }}</label>
                                            <input type="text" name="code" id="input-code" class="form-control form-control-alternative{{ $errors->has('code') ? ' is-invalid' : '' }}" placeholder="{{ __('Code') }}" value="{{$product->code}}" autofocus>

                                            @if ($errors->has('code'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('code') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{$product->name}}" autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- price input --}}
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-price">{{ __('Price') }}</label>
                                            <input type="text" name="price" id="input-price" class="form-control form-control-alternative{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Price') }}"  value="{{$product->price}}" required autofocus>

                                            @if ($errors->has('price'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('price') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- brand input --}}
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group{{ $errors->has('brand') ? ' has-danger' : '' }}">
                                           <label class="form-control-label" for="input-brand">{{ __('Brand') }}</label>
                                           <input type="text" name="brand" id="input-brand" class="form-control form-control-alternative{{ $errors->has('brand') ? ' is-invalid' : '' }}" placeholder="{{ __('Brand') }}" value="{{$product->brand}}" autofocus>

                                           @if ($errors->has('brand'))
                                               <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('brand') }}</strong>
                                               </span>
                                           @endif
                                       </div>
                                   </div>
                                </div>
                                {{-- subcategory input --}}
                                {{-- <div class="form-group{{ $errors->has('subcategory_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-subcategory_id">{{ __('Subcategory') }}</label>
                                    <select class="form-control" name="subcategory_id" id="subcategory_id" required>
                                        @if(count($subcategories)>0)
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}"
                                                {{ ( $product['subcategory_id'] == $subcategory['id'] )? 'selected' : '' }}
                                                >{{ $subcategory->subcategory_name}} </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div> --}}

                                {{-- category input --}}
                                <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-category_id">{{ __('Category ID') }}</label>
                                    <select class="form-control" name="category_id" id="category_id" >
                                        @if(count($categories)>0)
                                            <option value="" disabled selected>Select your option</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}"
                                                    {{ ( $product->category_id == $category->id )? 'selected' : '' }}
                                                >{{ $category->category_name}} </option>
                                            @endforeach
                                        @else
                                            <option value="">None</option>
                                        @endif
                                    </select>
                                </div>

                                {{-- dynamic image upload  --}}
                                <div class="row" >
                                        <div class="col-12" id="images">
                                            <div class="row">
                                                <h6 class="col-6 heading-small text-muted mb-3">{{ ('Product Images') }}</h6>
                                                <div class="col-6 ">
                                                    <button class="btn btn-primary" type="button" onClick="newImage()"><i class="fas fa-plus mr-2"></i>{{ ('Add more') }}</button>
                                                </div>
                                            </div>
                                            <div class="col-12" >
                                                <input type="hidden" name="totalImages" id="totalImages" value="1">
                                                <div class="row parent mb-2">
                                                    <div class="form-group col-5">
                                                        <label class="form-control-label" for="input-title1">{{ ('Title') }}</label>
                                                        <input type="text" name="title[]" id="input-title1" class="form-control form-control-alternative" placeholder="{{ ('Title') }}" value="default">
                                                    </div>
                                                    <div class="form-group col-5">
                                                        <label class="form-control-label">{{ ('Image') }}</label>
                                                        <div class="input-group input-group-alternative">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="ni ni-image"></i></span>
                                                            </div>
                                                            <div class="custom-file text-muted">
                                                                <input type="file" class="custom-file-input pl-2 image" name="image[]" id="image1"  onchange="myReadUrl(this,'1')" accept="image/*">
                                                                <label class="custom-file-label border-0" for="image1">{{ ('Image') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-2 preview">
                                                        @foreach ($products_image as $product_image)
                                                            @if($product_image->id==$product->id)
                                                                <input type="hidden" name="color_id" value="{{$product_image->color_id}}">
                                                                <input type="hidden" id="imgDB1" name="imgDB[]" value="{{$product_image->image}}">
                                                                <img id='gallery_1' class="img-fluid border shadow" src="{{asset('uploads/product_image/'.$product_image->image)}}" alt="" />
                                                            @endif
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>
                                            <?php $count=1?>
                                            @foreach ($products_image_color as $product_image_color)
                                                @if($product_image_color->id == $product->id)
                                                    <?php  $count++;$numberofImage = $count; ?>
                                                    <div class="col-12" >
                                                        {{-- <input type="hidden" name="totalImages" id="totalImages" value="1"> --}}
                                                        <div class="row parent mb-2">
                                                            <div class="form-group col-5">
                                                                <label class="form-control-label" for="input-title{{$product_image_color->image_order}}">{{ ('Title') }}</label>
                                                                <input type="text" name="title[]" id="input-title{{$product_image_color->image_order}}" class="form-control form-control-alternative" placeholder="{{ ('Title') }}" value="{{$product_image_color->color}}">
                                                            </div>
                                                            <div class="form-group col-5">
                                                                <label class="form-control-label">{{ ('Image') }}</label>
                                                                <div class="input-group input-group-alternative">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ni ni-image"></i></span>
                                                                    </div>
                                                                    <div class="custom-file text-muted">
                                                                        <input type="file" class="custom-file-input pl-2 image" name="image[]" id="image{{$product_image_color->image_order}}"  onchange="myReadUrl(this,'{{$product_image_color->image_order}}')" accept="image/*">
                                                                        <label class="custom-file-label border-0" for="image{{$product_image_color->image_order}}">{{ ('Image') }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-2 preview">
                                                                {{-- @foreach ($products_image as $product_image)
                                                                    @if($product_image->id==$product->id) --}}
                                                                        <input type="hidden" id="imgDB{{$product_image_color->image_order}}" name="imgDB[]" value="{{$product_image_color->image}}">
                                                                        <img id='gallery_{{$product_image_color->image_order}}' class="img-fluid border shadow" src="{{asset('uploads/product_image/'.$product_image_color->image)}}" alt="" />
                                                                    {{-- @endif
                                                                @endforeach --}}
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <?php $count_order = $product_image_color->image_order?>
                                                @endif
                                            @endforeach
                                            <input type="hidden" name="numberOfImage" value="{{$numberofImage}}">
                                        </div>
                                    </div>
                                    {{-- <div class="row parent mb-2">
                                            <div class="form-group col-5">
                                                <label class="form-control-label" for="input-title${count}">{{ ('Title') }}</label>
                                                <input type="text" name="title[]" id="input-title${count}" class="form-control form-control-alternative" placeholder="{{ ('Title') }}" value="{{ old('title1') }}">
                                            </div>
                                            <div class="form-group col-5">
                                                <label class="form-control-label">{{ ('Image') }}</label>
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-image"></i></span>
                                                    </div>
                                                    <div class="custom-file text-muted">
                                                        <input type="file" class="custom-file-input pl-2 image" name="image[]" onchange="myReadUrl(this,'${count}')"  accept="image/*">
                                                        <label class="custom-file-label border-0" for="imag${count}">{{ __('Image') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col preview">
                                                <img id="gallery_${count}" class="img-fluid border shadow" src="" alt="" />
                                            </div>
                                        </div> --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // let count = 1;
            // var count2 = {!! json_encode($products_image_color->toArray(), JSON_HEX_TAG) !!};
            var count = "<?php echo $count_order?>";
            // console.log(count3);
            // console.log(count2[0]);
            function readURL(input,id_count) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        // console.log($(`#gallery_${id_count}`))
                        //console.log($(input).parents('.parent'));
                        // console.log($(`#gallery_${id_count}`));
                        $(`#gallery_${id_count}`).attr('src', e.target.result)
                    //    console.log( $(input).parents('.parent').find(`#gallery_${id_count}`));
                        // add to src image as id
                        // $(input).parents('.parent').children('.preview').find('img.img-fluid').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            // $(`#image${count}`).change(function(){
            //     readURL(this);
            // });
            function myReadUrl(input_obj,count){
                readURL(input_obj,count);
                //console.log(input_obj);
            }
            function newImage() {
                count++;
                $('#images').append(`
                    <div class="row parent mb-2">
                        <div class="form-group col-5">
                            <label class="form-control-label" for="input-title${count}">{{ ('Title') }}</label>
                            <input type="text" name="title[]" id="input-title${count}" class="form-control form-control-alternative" placeholder="{{ ('Title') }}" value="{{ old('title1') }}">
                        </div>
                        <div class="form-group col-5">
                            <label class="form-control-label">{{ ('Image') }}</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-image"></i></span>
                                </div>
                                <div class="custom-file text-muted">
                                    <input type="file" class="custom-file-input pl-2 image" name="image[]" onchange="myReadUrl(this,'${count}')"  accept="image/*">
                                    <label class="custom-file-label border-0" for="imag${count}">{{ __('Image') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col preview">
                            <img id="gallery_${count}" class="img-fluid border shadow" src="" alt="" />
                        </div>
                    </div>
                `);
                $('#totalImages').val(count);

            }
        </script>
        @include('layouts.footers.auth')
    </div>
@endsection
