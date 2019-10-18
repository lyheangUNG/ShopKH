@extends('layouts.app', ['title' => __('Product Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Add Product')])

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
                        <form method="post" action="{{ route('products.store') }}" autocomplete="off" enctype="multipart/form-data">
                        {{-- <form method="post" action="{{ route('product.store') }}" autocomplete="off"> --}}
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Product information') }}</h6>
                            <div class="pl-lg-4">
                                {{-- upload img --}}
                                {{-- <div class="form-group">
                                    <label class="form-control-label" for="input-code">{{ __('Upload Image') }}</label>
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
                                    <img id='img-upload' class="img-thumbnail rounded mx-auto d-block"/>
                                </div> --}}
                                {{-- code and name input --}}
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                         <div class="form-group{{ $errors->has('code') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-code">{{ __('Code') }}</label>
                                            <input type="text" name="code" id="input-code" class="form-control form-control-alternative{{ $errors->has('code') ? ' is-invalid' : '' }}" placeholder="{{ __('Code') }}" value="{{ old('code') }}" required autofocus>
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
                                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required>

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
                                            <input type="text" name="price" id="input-price" class="form-control form-control-alternative{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Price') }}" value="{{ old('price') }}" required>

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
                                           <input type="text" name="brand" id="input-brand" class="form-control form-control-alternative{{ $errors->has('brand') ? ' is-invalid' : '' }}" placeholder="{{ __('Brand') }}" value="{{ old('brand') }}" >

                                           @if ($errors->has('brand'))
                                               <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('brand') }}</strong>
                                               </span>
                                           @endif
                                       </div>
                                   </div>
                                </div>
                                {{-- category input --}}
                                <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-category_id">{{ __('Category ID') }}</label>
                                    <select class="form-control" name="category_id" id="category_id" >
                                        @if(count($categories)>0)
                                            <option value="" disabled selected>Select your option</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}"
                                                >{{ $category->category_name}} </option>
                                            @endforeach
                                        @else
                                            <option value="">None</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="row">
                                    <h6 class="col-6 heading-small text-muted mb-3">{{ ('Product Size') }}</h6>
                                    <div class="col-6">
                                        <button class="btn btn-primary" type="button" onClick="newSize()"><i class="fas fa-plus mr-2"></i>{{ ('Add more') }}</button>
                                    </div>
                                </div>
                                <div class="row" id="sizes">
                                    <div class="col-lg-2">
                                            <div class="form-group{{ $errors->has('size') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-size1">{{ __('Size') }}</label>
                                                    <input type="text" name="size[]" id="input-size1" class="form-control form-control-alternative{{ $errors->has('size') ? ' is-invalid' : '' }}" placeholder="{{ __('Size') }}" >
                                        {{-- <label for="">Size</label>
                                        <input type="text"> --}}
                                            </div>
                                    </div>
                                </div>
                                {{-- dynamic image upload  --}}
                                <div class="row mt-2" >
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
                                                    <img id='gallery_1' class="img-fluid border shadow" src="" alt="" />
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ ('Save') }}</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // $(document).ready( function() {
            //     $(document).on('change', '.btn-file :file', function() {
            //     var input = $(this),
            //         label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            //     input.trigger('fileselect', [label]);
            //     });
            //     $('.btn-file :file').on('fileselect', function(event, label) {

            //         var input = $(this).parents('.input-group').find(':text'),
            //             log = label;

            //         if( input.length ) {
            //             input.val(log);
            //         } else {
            //             if( log ) alert(log);
            //         }

            //     });
            //     function readURL(input) {
            //         if (input.files && input.files[0]) {
            //             var reader = new FileReader();

            //             reader.onload = function (e) {
            //                 $('#img-upload').attr('src', e.target.result);
            //             }

            //             reader.readAsDataURL(input.files[0]);
            //         }
            //     }
            //     $("#imgInp").change(function(){
            //         readURL(this);
            //     });
            // });
            let count = 1;
            var countSize = 1;
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
            function newSize() {
                countSize++;
                $('#sizes').append(`
                    <div class="col-lg-2">
                        <div class="form-group{{ $errors->has('size') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-size${countSize}">{{ __('Size') }}</label>
                            <input type="text" name="size[]" id="input-size${countSize}" class="form-control form-control-alternative{{ $errors->has('size') ? ' is-invalid' : '' }}" placeholder="{{ __('Size') }}" >
                        </div>
                    </div>
                `);
                // $('#totalImages').val(count);
            }
        </script>

        @include('layouts.footers.auth')
    </div>
@endsection
