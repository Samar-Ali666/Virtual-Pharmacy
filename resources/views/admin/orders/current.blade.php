@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Current Orders</h1>
@stop

@section('content')
    <p>Manage all current orders from this admin panel.</p>

    <div class="container-fuild">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="text-center">Current Orders</h3>
                        @if(count($orders) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mt-2">
                                <thead>
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <th>Placed</th>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    @foreach($order->products as $product)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>
                                            <img style="height: 50px" src="{{$product->photo->file}}" alt="">
                                        </td>
                                        <td>{{$product->pivot->quantity}}</td>
                                        <td>
                                            <span class="badge badge-primary">
                                                processing
                                            </span>
                                        </td>
                                        <td>    
                                            PKR {{$product->price * $product->pivot->quantity}}
                                        </td>
                                        <td>{{$order->created_at->diffForHumans()}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span class="border border-top-0 border-right-0 border-success p-1">
                                                Total: {{$order->total}} Rs
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('order.detail', $order->id) }}" class="btn btn-sm btn-primary">Order Details &rarr;</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{-- {!! $orders->links() !!} --}}
                            </div>
                        </div>
                        @else
                        <div class="row text-center mt-5">
                            <div class="col-md-12">
                                <img style="height: 400px;"  src="/assets/images/shop/grid/large-margins/no-order.svg" alt="">
                                <h2 class="mt-2">No curent order yet!</h2>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    
@stop

@section('js')
    @include('sweetalert::alert')
@stop