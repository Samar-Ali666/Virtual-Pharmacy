@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{$staff->firstname}} (Staff)</h1>
@stop

@section('content')
    <p>See your all staff members rom this panel.</p>

    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-md-4">
          <div class="card shadow">
            <div class="card-body">
               <div class="text-center">
                 <img class="border border-success rounded-circle p-1" src="/assets/images/user_icon.png" height="110" alt="">
                 <h4 class="mt-2">{{$staff->firstname}} {{$staff->lastname}}</h4>
                 <i class="fas fa-lock text-success mr-1"></i>
                 <small class="lead">staff member</small>
                 <div class="mt-2">
                    @if($staff->is_approved == 1)
                    <span class="badge badge-success">
                      Approved
                    </span>
                    @else
                    <span class="badge badge-warning">
                      Unapproved
                    </span>
                    @endif
                 </div>
               </div>
               <hr>

               <div class="container">
                 <div class="input-group">
                 <div class="input-group-prepend mb-2">
                   <span class="input-group-text bg-success">Firstname</span>
                 </div>
                 <input class="form-control mb-2" type="text" value="{{$staff->firstname}}" disabled="disabled">
               </div>
                 <div class="input-group">
                 <div class="input-group-prepend mb-2">
                   <span class="input-group-text bg-success">Lastname</span>
                 </div>
                 <input class="form-control mb-2" type="text" value="{{$staff->lastname}}" disabled="disabled">
               </div>

                 <div class="input-group">
                 <div class="input-group-prepend mb-2">
                   <span class="input-group-text bg-success">@</span>
                 </div>
                 <input class="form-control mb-2" type="text" value="{{$staff->email}}" disabled="disabled">
               </div>
               <hr>
               <form action="{{ route('admin.staff.changeStatus', $staff->id) }}" method="post">
                @csrf
                @method('PUT')
                 <div class="input-group">
                   <div class="input-group-prepend">
                     <span class="input-group-text">Status</span>
                   </div>
                   <select class="form-control" name="is_approved">
                    <option value="">Select status</option>
                     <option value="1">Approve</option>
                     <option value="0">Unapprove</option>
                   </select>
                   <div class="input-group-append">
                     <button type="submit" class="btn btn-success">
                       <i class="fas fa-check"></i>
                     </button>
                   </div>
                 </div>
               </form>
               </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card shadow">
            <div class="card-header bg-light">
              <h4>{{$staff->firstname}} products</h4>
            </div>
            <div class="card-body">
              @if(count($staff->product) > 0)
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
                    @foreach($staff->product as $product)
                    <tr>
                      <td>{{$product->id}}</td>
                      <td><img src="{{$product->photo->file}}" height="40" alt=""></td>
                      <td>{{$product->name}}</td>
                      <td>{{$product->company}}</td>
                      <td>{{$product->category->name}}</td>
                      <td>{{$product->subcategory->name}}</td>
                      @if($product->is_publish == 0)
                      <td>
                        <span class="badge badge-warning">Unapproved</span>
                      </td>
                      @else
                      <td>
                        <span class="badge badge-success">Approved</span>
                      </td>
                      @endif
                      <td>
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary btn-sm">
                          <i class="fas fa-eye"></i>
                        </a>
                      </td>
                    </tr>
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