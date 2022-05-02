@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Completed Orders</h1>
@stop

@section('content')
    <p>Manage all completed orders from this admin panel.</p>

    <div class="container-fuild">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="text-center">Completed Orders</h3>
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
                                            <span class="badge badge-success">
                                                completed
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