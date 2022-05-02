@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Order Details</h1>
@stop

@section('content')
    <p>See all order details from this admin panel.</p>

    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-header bg-light">
                        <h4 class="text-center">Order items</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>product</th>
                                    <th>name</th>
                                    <th>quantity</th>
                                </thead>
                                <tbody>
                                    @foreach($order->products as $product)
                                    <tr>
                                        <td>
                                            <a href="{{ route('product.single', $product->id) }}">
                                                <img style="height: 30px" src="{{$product->photo->file}}">
                                            </a>
                                        </td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->pivot->quantity}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card shadow">
                    <div class="card-header bg-light">
                        <h4 class="text-center">Order Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h6 class="font-weight-bold text-center">Customer</h6>
                                <p class="lead text-center border border-top-0 border-info">{{$order->user->firstname}} {{$order->user->lastname}}</p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="font-weight-bold text-center">Email</h6>
                                <p class="lead text-center border border-top-0 border-info">{{$order->user->email}}</p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="font-weight-bold text-center">Contact</h6>
                                <p class="lead text-center border border-top-0 border-info">{{$order->phone}}</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <h6 class="font-weight-bold text-center">Country</h6>
                                <p class="lead text-center border border-top-0 border-info">{{$order->country}}</p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="font-weight-bold text-center">City</h6>
                                <p class="lead text-center border border-top-0 border-info">{{$order->city}}</p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="font-weight-bold text-center">Status</h6>
                                <p class="lead text-center border border-top-0 border-info">
                                    @if($order->status == 0)
                                    <span class="badge badge-primary badge-pill">processing</span>
                                    @elseif($order->status == 1)
                                    <span class="badge badge-info badge-pill">shipped</span>
                                    @elseif($order->status == 2)
                                    <span class="badge badge-success badge-pill">received</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <h6 class="font-weight-bold text-center">Address</h6>
                                <p class="lead text-center border border-top-0 border-info">{{$order->address}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card shadow">
                    <div class="card-header bg-light">
                        <h4 class="text-center">Actions</h4>    
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('admin.current.orders') }}" class="btn btn-primary btn-block">&larr;</a>
                            </div>
                            <div class="col-md-12">
                                <form action="{{ route('order.change.status', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <hr>
                                <p class="lead text-center">Change status</p>
                                <select class="form-control" name="status">
                                    <option value="">select status</option>
                                    <option value="0">processing</option>
                                    <option value="1">shipped</option>
                                    <option value="2">received</option>
                                </select>
                                <button type="submit" class="btn btn-outline-success btn-block mt-2">
                                    <i class="fas fa-check"></i>
                                </button>
                                </form>
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