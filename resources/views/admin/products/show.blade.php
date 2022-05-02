@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{$product->name}}</h1>
@stop

@section('content')
    <p>Watch all product details from this panel.</p>

    <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-md-3">
            <div class="card shadow">
              <div class="card-body">
                <img class="img-fluid" src="{{$product->photo->file}}"/> 
              </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="{{$product->pdf->file}}"></iframe>
                  </div>
                </div>
              </div>
          </div>
            <div class="col-md-7">
                <div class="card shadow">
                    <div class="card-header bg-light">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>{{$product->name}} Details</h4>
                                @if($product->is_publish == 1)
                                <b>Status:</b> <span class="badge badge-success">
                                    Approved
                                </span>
                                @elseif($product->is_publish == 0)
                                <b>Status:</b> <span class="badge badge-warning">
                                    Unapproved
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="row mt-4">
                          <div class="col-md-4 mb-2">
                              <h6 class="font-weight-bold text-center mb-3">Product Name</h6>
                              <p class="lead text-center border border-top-0 border-info">{{$product->name}}</p>
                          </div>
                          <div class="col-md-4 mb-2">
                              <h6 class="font-weight-bold text-center mb-3">Company Name</h6>
                              <p class="lead text-center border border-top-0 border-info">{{$product->company}}</p>
                          </div>
                          <div class="col-md-4 mb-2">
                              <h6 class="font-weight-bold text-center mb-3">Stock Available</h6>
                              <p class="lead text-center border border-top-0 border-info">{{$product->stock}}</p>
                          </div>
                      </div>
                      <div class="row mt-4">
                          <div class="col-md-4 mb-2">
                            <h6 class="font-weight-bold text-center mb-3">Category</h6>
                            <p class="lead text-center border border-top-0 border-info">{{$product->category->name}}</p>
                          </div>
                          <div class="col-md-4 mb-2">
                              <h6 class="font-weight-bold text-center mb-3">Subcategory</h6>
                                <p class="lead text-center border border-top-0 border-info">{{$product->subcategory->name}}</p>
                          </div>
                          <div class="col-md-4 mb-2">
                              <h6 class="font-weight-bold text-center mb-3">Price</h6>
                              <p class="lead text-center border border-top-0 border-info">{{$product->price}} RS</p>
                          </div>
                      </div>
                      <div class="row mt-4">
                          <div class="col-md-12">
                            <h6 class="font-weight-bold text-center mb-3">Short Description</h6>
                            <p class="lead text-center border border-top-0 border-info">{{$product->description}}</p>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card shadow">
                    <div class="card-header bg-light">
                        <h5 class="text-center">Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('product.index') }}" class="btn btn-primary btn-block">
                                     &larr; Back
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info btn-block mt-2">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('product.destroy', $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <div class="row">
                                    <div class="col-md-12">
                                    <button class="btn btn-danger btn-block mt-2" onclick="return confirm('Are you sure you want to delete this product');">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="row d-flex justify-content-center">
                            <form method="POST" action="{{ route('product.update.status', $product->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                 <select class="form-control" name="is_publish" id="">
                                     <option value="">Select status</option>
                                     <option value="0">Unapproved</option>
                                     <option value="1">Approved</option>
                                 </select>
                                     <button class="btn btn-outline-success btn-block mt-2">
                                        <i class="fas fa-check"></i>
                                     </button>
                            </div>
                            </form>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <span class="text-center">
                                    <a class="d-flex justify-content-center" href="{{$product->pdf->file}}">Read full description</a>
                                </span>
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