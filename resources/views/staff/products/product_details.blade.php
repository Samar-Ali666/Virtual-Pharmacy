@extends('layouts.staff-master')
@section('content')

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
    	<h1 class="h3 mb-0 text-gray-800">{{$product->name}} Details</h1>
	</div>
</div>

<div class="container-fluid">
	<div class="row mb-3">
		<div class="col-md-3">
			<div class="card shadow">
				<div class="card-body">
					<img class="img-fluid" src="{{$product->photo->file}}" alt="">
				</div>
			</div>
			<div class="card shadow mt-3">
				<div class="card-body">
					<div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="{{$product->pdf->file}}"></iframe>
                  </div>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="card shadow">
				<div class="card-header">
					<h4>{{$product->name}}</h4>
					@if($product->is_publish == 1)
					<b>Status</b>
					 <span class="badge badge-success">
                        Approved
                    </span>
                    @elseif($product->is_publish == 0)
	                    <b>Status:</b> <span class="badge badge-warning">
	                        Pending
	                    </span>
					@endif
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
	</div>
</div>

@endsection