@extends('layouts.app', ['title' => __('Ads Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Add Ads')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Ads Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('ads.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('ads.update',$ad->id) }}" autocomplete="off" enctype="multipart/form-data">
                        {{-- <form method="post" action="{{ route('ads.store') }}" autocomplete="off"> --}}
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">{{ __('Ads information') }}</h6>
                            <div class="pl-lg-4">
                                {{-- upload img --}}
                                <div class="form-group">
                                    <label class="form-control-label" for="input-code">{{ __('Upload Image') }}</label>
                                    <input type="hidden" id=imgDB name="imgDB" value="{{$ad->image}}">
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
                                    <img src="{{asset( 'uploads/ads/' . $ad->image )}}" id='img-upload' class="img-thumbnail rounded mx-auto d-block"/>
                                    {{-- <img id='img-upload' class="img-thumbnail rounded mx-auto d-block"/> --}}
                                </div>
                                {{-- code and name input --}}
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{$ad->name}}" required >

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('start_date') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Start Date') }}</label>
                                            <input type="text" name="start_date" id="input-name" class="datepicker form-control form-control-alternative{{ $errors->has('start_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Start Date') }}" value="{{str_replace('-', '/',$ad->start_date)}}" required >

                                            @if ($errors->has('start_date'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('start_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('end_date') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('End Date') }}</label>
                                            <input type="text" name="end_date" id="input-name" class="datepicker form-control form-control-alternative{{ $errors->has('end_date') ? ' is-invalid' : '' }}" placeholder="{{ __('End Date') }}" value="{{str_replace('-', '/',$ad->end_date)}}" required >

                                            @if ($errors->has('end_date'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('end_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
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
            $(document).ready( function() {
                $('.datepicker').datepicker({
                    format: 'yyyy/mm/dd',
                    weekStart:1,
                    color: 'red',
                });
                $(document).on('change', '.btn-file :file', function() {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
                });
                $('.btn-file :file').on('fileselect', function(event, label) {

                    var input = $(this).parents('.input-group').find(':text'),
                        log = label;

                    if( input.length ) {
                        input.val(log);
                    } else {
                        if( log ) alert(log);
                    }

                });
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#img-upload').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#imgInp").change(function(){
                    readURL(this);
                });
            });
        </script>

        @include('layouts.footers.auth')
    </div>
@endsection
