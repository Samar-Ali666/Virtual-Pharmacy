@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add New Product</h1>
@stop

@section('content')
    <p>Add new product from this panel.</p>

    <div class="container-fluid">
      @include('admin.includes.errors')
        <div class="row mt-4">
          <div class="col-md-3">
            <div class="card shadow">
              <div class="card-body">
                <img class="img-fluid" src="#" id="product-img" /> 
              </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="#" id="product-description"></iframe>
                  </div>
                </div>
              </div>
          </div>
            <div class="col-md-9">
                <div class="card shadow">
                    <div class="card-header bg-light">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Product Details</h4>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                      @csrf
                    <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="input-group">
                            <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                      </div>
                      <div class="custom-file">
                        <input name="photo_id" type="file" class="custom-file-input" id="prod_image" aria-describedby="inputGroupFileAddon01" required="required">
                        <label class="custom-file-label" for="prod_image">Choose photo to upload</label>
                      </div>
                      </div>
                          </div>
                          <div class="col-md-6">
                              <div class="input-group">
                            <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                      </div>
                      <div class="custom-file">
                        <input name="pdf_id" type="file" class="custom-file-input" id="prod_desc" aria-describedby="inputGroupFileAddon01" required="required">
                        <label class="custom-file-label" for="prod_desc">Upload pdf file containing description</label>
                      </div>
                      </div>
                          </div>
                      </div>
                      <div class="row mt-4">
                          <div class="col-md-4 mb-2">
                              <label for="">Product Name:</label>
                              <input type="text" name="name" class="form-control" value="{{old('name')}}"  placeholder="Enter product name" required="required">
                          </div>
                          <div class="col-md-4 mb-2">
                              <label for="">Company Name:</label>
                              <input type="text" name="company" class="form-control" value="{{old('company')}}" placeholder="Enter company name" required="required">
                          </div>
                          <div class="col-md-4 mb-2">
                              <label for="">Stock available:</label>
                              <input type="number" name="stock" class="form-control" value="{{old('stock')}}" placeholder="Select stock available">
                          </div>
                      </div>
                      <div class="row mt-4">
                          <div class="col-md-4 mb-2">
                            <label for="">Category:</label>
                                <select class="form-control" name="category_id" id="select1" required="required">
                                  <option value="">Select category</option>
                                  @foreach($categories as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                  @endforeach
                                </select>
                          </div>
                          <div class="col-md-4 mb-2">
                              <label for="">Subcategory:</label>
                                <select class="form-control" name="subcategory_id" id="select2" required="required">
                                  <option value="">Select subcategory</option>
                                  @foreach($subcategories as $subcategory)
                                  <option value="{{$subcategory->id}}" name="{{$subcategory->category->id}}">{{$subcategory->name}}</option>
                                  @endforeach
                                </select>
                          </div>
                          <div class="col-md-4 mb-2">
                              <label for="">Price:</label>
                              <input type="text" name="price" class="form-control" value="{{old('price')}}" placeholder="Enter product price">
                          </div>
                      </div>
                      <div class="row mt-4">
                          <div class="col-md-12">
                            <textarea class="form-control" name="description" id="" cols="10" rows="8" required="required" placeholder="Write short description about the product"></textarea>
                            <input type="hidden" name="is_publish" value="1">
                          </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-12">
                          <button class="btn btn-success btn-block">
                            <i class="fas fa-plus"></i> Add Product
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
@include('admin.includes.subcategory-selection')
@include('admin.includes.product-img-preview-script')
@include('admin.includes.pdf-preview')
@stop 