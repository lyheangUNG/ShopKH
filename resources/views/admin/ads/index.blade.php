@extends('layouts.app', ['title' => __('Ads Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card bg-default shadow">
                    <div class="card-header bg-transparent border-0">
                        <div class="row align-items-center">
                                    <div class="col-4">
                                        <h3 class="text-white mb-0">Ads</h3>
                                    </div>
                                    <form class="col-4 mb-2 mt-2" method="get" action="{{ route('ads.index') }}">
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
                                    <span class="text-white mb-0" id="total_records">Total data : {{$ads->total()}}</span>
                                    </div>
                                    <div class="col-2 text-right">
                                            <a href="{{ route('ads.create') }}" class="btn btn-sm btn-success">{{ __('Add Ads') }}</a>
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
                                    <th scope="col">{{ __('Image') }}</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Start Date') }}</th>
                                    <th scope="col">{{ __('End Date') }}</th>
                                    {{-- <th scope="col">{{ __('Created Date') }}</th> --}}
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody id="ads_table">
                                @foreach ($ads as $ad)
                                    <tr class="text-white">
                                        <td>{{ $ad->id }}</td>
                                        <td><img src="{{asset( 'uploads/ads/' . $ad->image )}}" alt="" class="img-thumbnail " style="width:250px;"></td>
                                        <td>{{ $ad->name }}</td>
                                        <td>{{ $ad->start_date }}</td>
                                        <td>{{ $ad->end_date}}</td>
                                        {{-- <td>{{ $ad->created_at->format('d/m/Y H:i') }}</td> --}}
                                        <td>
                                            {{-- <a href="{{route('ads.show',$ad->id)}}"><i class="fas fa-eye text-secondary mr-3"></i></a> --}}
                                            {{-- <a href="{{route('ads.edit',$product->id)}}"><i class="fas fa-pen-nib mr-3"></i></a> --}}
                                            <a href="/admin/ads/{{$ad->id}}/edit?page={{$ads->currentPage()}}"><i class="fas fa-pen-nib text-success mr-3"></i></a>
                                            <i style="cursor: pointer" class="fas fa-trash-alt action-icon text-danger mr-3" onclick="deleteAd('<?php echo $ad->id; ?>')"></i>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $ads->links() }}  --}}
                    </div>
                    <div class="card-footer bg-default py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $ads->links() }}
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
                //     $('.ads').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="../public/images/loading.gif" />');
                //     var url = $(this).attr('href');
                //     getProducts($(this).attr('href').split('page=')[1]);
                //     e.preventDefault();
                // });
                $(document).on('click', '.pagination a', function (e) {
                    getProducts($(this).attr('href').split('page=')[1]);
                    e.preventDefault();
                });
            });
            function getads(page) {
                $.ajax({
                    url : '?page=' + page,
                    type : "get",
                    dataType: 'json',
                    data:{
                        search: $('#search').val()
                    },
                }).done(function (data) {
                    $('.ads').html(data);
                    location.hash = page;
                }).fail(function (msg) {
                    alert('page can\'t be load');
                });
            }
        </script>

    <script>
        function deleteAd(id){
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
                            url:`${URL}/admin/ads/${id}` ,
                            // data: { _token: token, product_id: id },
                            data: { _token: token },
                            success:function(data) {
                                console.log('Success');
                                window.location.href = `${URL}/admin/ads`;
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


