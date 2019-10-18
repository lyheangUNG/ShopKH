@extends('layouts.app', ['title' => __('Category Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Add Category')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Category Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('categories.update',$category->id)}}" autocomplete="off">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">{{ __('Category information') }}</h6>
                            <div class="pl-lg-4">
                                {{-- code and name input --}}
                                <div class="row">
                                        <div class="col-12">
                                            <div class="form-group{{ $errors->has('category_name') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-category_name">{{ __('Category_name') }}</label>
                                                <input type="text" name="category_name" id="input-category_name" class="form-control form-control-alternative{{ $errors->has('category_name') ? ' is-invalid' : '' }}" placeholder="{{ __('category_name') }}" value="{{$category->category_name}}" required autofocus>

                                                @if ($errors->has('category_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('category_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                {{-- <div class="row">
                                    <div class="col-12">
                                         <div class="form-group{{ $errors->has('parent_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-parent_id">{{ __('Parent ID') }}</label>
                                            <input type="text" name="parent_id" id="input-parent_id" class="form-control form-control-alternative{{ $errors->has('parent_id') ? ' is-invalid' : '' }}" placeholder="{{ __('Parent ID') }}" value="{{ old('parent_id') }}" required>

                                            @if ($errors->has('parent_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('parent_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- category input --}}
                                <div class="form-group{{ $errors->has('parent_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-parent_id">{{ __('Parent ID') }}</label>
                                    <select class="form-control" name="parent_id" id="parent_id">
                                        @if(count($categories)>0)
                                            <option value="">None</option>
                                            @if($category['parent_id']==NULL)
                                                @foreach ($categoryParentNull as $categoryPN)
                                                    <option value="{{$categoryPN->id}}">{{ $categoryPN->category_name}} </option>
                                                @endforeach
                                            @else
                                                @foreach ($categories as $cate)
                                                    @if($category->id!=$cate->id)
                                                        <option value="{{$cate->id}}"
                                                        {{ ( $category['parent_id'] === $cate['id']) ? 'selected' : '' }}
                                                        >{{ $cate->category_name}} </option>
                                                    @endif

                                                @endforeach
                                            @endif
                                        @else
                                            <option value="">None</option>
                                        @endif
                                    </select>
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

        @include('layouts.footers.auth')
    </div>
@endsection
