@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{$user->firstname}} (Customer)</h1>
@stop

@section('content')
    <p>See your all users rom this panel.</p>

    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-md-4">
          <div class="card shadow">
            <div class="card-body">
               <div class="text-center">
                 <img class="border border-success rounded-circle p-1" src="/assets/images/user_icon.png" height="110" alt="">
                 <h4 class="mt-2">{{$user->firstname}} {{$user->lastname}}</h4>
                 <i class="fas fa-user text-success mr-1"></i>
                 <small class="lead">customer</small>
                 <div class="mt-2">
                 </div>
               </div>
               <hr>

               <div class="container">
                 <div class="input-group">
                 <div class="input-group-prepend mb-2">
                   <span class="input-group-text bg-success">Firstname</span>
                 </div>
                 <input class="form-control mb-2" type="text" value="{{$user->firstname}}" disabled="disabled">
               </div>
                 <div class="input-group">
                 <div class="input-group-prepend mb-2">
                   <span class="input-group-text bg-success">Lastname</span>
                 </div>
                 <input class="form-control mb-2" type="text" value="{{$user->lastname}}" disabled="disabled">
               </div>

                 <div class="input-group">
                 <div class="input-group-prepend mb-2">
                   <span class="input-group-text bg-success">@</span>
                 </div>
                 <input class="form-control mb-2" type="text" value="{{$user->email}}" disabled="disabled">
               </div>
               <hr>
               </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card shadow">
            <div class="card-header bg-light">
              <h4>{{$user->firstname}} Orders</h4>
            </div>
            <div class="card-body">
              @if(count($orders) > 0)
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                      @foreach($order->products as $product)
                      <tr>
                      <td>{{$order->id}}</td>
                      <td><img src="{{$product->photo->file}}" height="50" alt=""></td>
                      <td>{{$product->name}}</td>
                      <td>{{$product->company}}</td>
                      <td>{{$product->category->name}}</td>
                      <td>{{$product->subcategory->name}}</td>
                      <td>
                        @if($order->status == 0)
                            <span class="badge badge-primary">processing</span>
                          @elseif($order->status == 1)
                            <span class="badge badge-info">shipped</span>
                          @elseif($order->status == 2)
                            <span class="badge badge-success">received</span>
                          @endif
                      </td>
                      <td>
                        <a href="{{ route('order.detail', $order->id) }}" class="btn btn-primary btn-sm">
                          <i class="fas fa-eye"></i>
                        </a>
                      </td>
                      </tr>
                      @endforeach
                    @endforeach
                  </tbody>
                </table>
              </div>
              @else
              <div class="row text-center">
                <div class="col-md-12">
                  <img src="/assets/images/shop/grid/large-margins/no-products.svg" width="300" alt="">
                  <h4 class="mt-2">No orders yet from this user</h4>
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