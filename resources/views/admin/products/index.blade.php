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
                                    <form class="col-4 mb-2 mt-2" method="get" action="{{ route('products.index') }}">
                                                <div class="input-group input-group-alternative">
                                                    {{-- <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                    </div> --}}
                                                <input class="form-control" placeholder="Search" type="text" name="search" id="search" value="{{$keyword}}" style="border: 1px solid #11cdef">
                                                <span class="form-clear d-none"><i class="fas fa-times-circle">clear</i></span>
                                                <div class="input-group-append">

                                                    <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                                                    </div>
                                            </div>
                                    </form>
                                    {{-- <div class="col-4 mb-2 mt-2">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Search" type="text" name="search" id="search">
                                            <div class="input-group-append">
                                                    <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-2">
                                    <span class="text-white mb-0" id="total_records">Total data : {{$products->total()}}</span>
                                    </div>
                                    <div class="col-2 text-right">
                                            <a href="{{ route('products.create') }}" class="btn btn-sm btn-success">{{ __('Add Product') }}</a>
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

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Code') }}</th>
                                    <th scope="col">{{ __('Image') }}</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Price') }}</th>
                                    {{-- <th scope="col">{{ __('Size') }}</th> --}}
                                    <th scope="col">{{ __('Brand') }}</th>
                                    <th scope="col">{{ __('Created Date') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody id="products_table">
                                @foreach ($products as $product)
                                    <tr class="text-white">
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->code }}</td>
                                        @foreach ($products_image as $product_image)
                                            @if($product->id==$product_image->id)
                                                <td><img src="{{asset( 'uploads/product_image/' . $product_image->image )}}" alt="" class="img-thumbnail " style="width:100px;heigth:100px;"></td>
                                            @endif
                                        @endforeach
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->brand }}</td>

                                        <td>{{ $product->created_at->format('d/m/Y H:i') }}</td>

                                        {{-- <td>{{ $product->description }}</td> --}}
                                        {{-- <td> --}}
                                        {{-- dot button to right most --}}
                                        {{-- <td class="text-right"> --}}
                                            {{-- <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <form action="products/{{$product->id}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a class="dropdown-item" href="/admin/products/{{$product->id}}/edit?page={{$products->currentPage()}}" id="edit">{{ __('Edit') }}</a>
                                                        <button class="dropdown-item delete-btn" type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            </div> --}}
                                        {{-- </td> --}}
                                        <td>
                                            <a href="{{route('products.show',$product->id)}}"><i class="fas fa-eye text-secondary mr-3"></i></a>
                                            {{-- <a href="{{route('products.edit',$product->id)}}"><i class="fas fa-pen-nib mr-3"></i></a> --}}
                                            <a href="/admin/products/{{$product->id}}/edit?page={{$products->currentPage()}}"><i class="fas fa-pen-nib text-success mr-3"></i></a>
                                            @if ($product->status === 1)
                                                <i style="cursor: pointer" class="fas fa-trash-alt action-icon text-danger mr-3" onclick="deleteProduct('<?php echo $product->id; ?>')"></i>
                                            @else
                                                <i style="cursor: pointer;color:gray" class="fas fa-trash-alt action-icon mr-3"  onclick="deleteProduct('<?php echo $product->id; ?>')"></i>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $products->links() }}  --}}
                    </div>
                    <div class="card-footer bg-default py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $products->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> --}}
        <script>
            $(window).on('hashchange', function() {
                if (window.location.hash) {
                    var page = window.location.hash.replace('#', '');
                    if (page == Number.NaN || page <= 0) {
                        return false;
                    } else {
                        getProducts(page);
                    }
                }
            });
            $(document).ready(function() {
                // $(document).on('click', '.pagination a', function (e) {
                //     $('.products').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="../public/images/loading.gif" />');
                //     var url = $(this).attr('href');
                //     getProducts($(this).attr('href').split('page=')[1]);
                //     e.preventDefault();
                // });
                $(document).on('click', '.pagination a', function (e) {
                    getProducts($(this).attr('href').split('page=')[1]);
                    e.preventDefault();
                });
            });
            function getproducts(page) {
                $.ajax({
                    url : '?page=' + page,
                    type : "get",
                    dataType: 'json',
                    data:{
                        search: $('#search').val()
                    },
                }).done(function (data) {
                    $('.products').html(data);
                    location.hash = page;
                }).fail(function (msg) {
                    alert('page can\'t be load');
                });
            }
        </script>

    <script>
        function deleteProduct(id){
                Swal.fire({
                    position: 'center',
                    title: 'Warning',
                    text: "Are you sure?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#2dce89',
                    cancelButtonColor: '#f5365c',
                    confirmButtonText: 'Yes',
                    // showLoaderOnConfirm: true,
                    // preF
                }).then((result) => {
                    if (result.value) {
                        let URL = '<?php echo URL::to('/') ?>';
                        // console.log(URL);
                        let token = '<?php echo csrf_token() ?>';
                        // console.log(token);
                        $.ajax({
                            type:'DELETE',
                            url:`${URL}/admin/products/${id}` ,
                            // data: { _token: token, product_id: id },
                            data: { _token: token },
                            success:function(data) {
                                console.log('Success');
                                window.location.href = `${URL}/admin/products`;
                            },
                            error: function(error){
                                console.log("Error",error);
                            }
                        });

                    }
                })
            }
    </script>


        @include('layouts.footers.auth')
    </div>
@endsection


