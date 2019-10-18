@extends('layouts.users')
@section('contents')
<style>
    th,td{
        vertical-align: middle !important;
    }
</style>
    <div class="container mt-4">
        <?php $total = 0 ;?>
        @if(!empty($cartProducts)>0)
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Size</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">SubTotal</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($cartProducts as $cartProduct)
                        <tr>
                            <th scope="row">{{$cartProduct['id']}}</th>
                            {{-- <td><img src="{{asset('uploads/product_image/'.$color)}}" alt="" style="width:100px;" class="img-fluid"></td> --}}
                            <td><img src="{{asset('uploads/product_image/'.$cartProduct['color'])}}" alt="" style="width:100px;" class="img-fluid"></td>
                            <td>{{$cartProduct['code']}}</td>
                            <td>{{$cartProduct['name']}}</td>
                            <td>{{$cartProduct['size']}}</td>
                            <td>{{$cartProduct['quantity']}}</td>
                            <td>{{$cartProduct['price']}} USD</td>
                            <td>{{$cartProduct['quantity']*$cartProduct['price']}} USD</td>
                            <td>
                                <a href="{{route('product.removecart',$loop->iteration-1)}}"><i style="cursor: pointer" class="fas fa-trash-alt action-icon text-danger mr-3"></i></a>
                            </td>
                            {{-- <td>{{$loop->iteration-1}}</td> --}}
                            {{-- <td>{{$size}}</td> --}}
                            {{-- <td>{{$quantity}}</td> --}}
                            {{-- @if($total  0){} --}}
                            <?php $total = $total + $cartProduct['quantity']*$cartProduct['price']?>
                            {{-- <td>{{$total}}</td> --}}
                        </tr>
                    @endforeach
                    <td colspan="9" class="text-right" style="padding-right:135px;">Total &nbsp: &nbsp{{$total}} &nbspUSD</td>
            </tbody>
        </table>
        <div class="row">
            <div class="col-12 text-right">
                <a class="btn btn-info text-white" href="">Check Out</a>
            </div>
        </div>
        @endif
    {{-- {{$images['0']['0']['image']}} --}}

    </div>
@endsection


