@extends('layouts.staff-master')
@section('content')

<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	    <a href="{{ route('add.product.page') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
	            class="fas fa-plus fa-sm text-white-50"></i> Create product</a>
	</div>

	<!-- Content Row -->
	<div class="row">

	    <!-- Earnings (Monthly) Card Example -->
	    <div class="col-xl-3 col-md-6 mb-4">
	        <div class="card border-left-primary shadow h-100 py-2">
	            <div class="card-body">
	                <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                            My Products</div>
	                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($products)}}</div>
	                    </div>
	                    <div class="col-auto">
	                        <i class="fas fa-folder fa-2x text-gray-300"></i>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

	    <!-- Earnings (Monthly) Card Example -->
	    <div class="col-xl-3 col-md-6 mb-4">
	        <div class="card border-left-success shadow h-100 py-2">
	            <div class="card-body">
	                <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
	                            Approved (Products)</div>
	                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($approved_products)}}</div>
	                    </div>
	                    <div class="col-auto">
	                        <i class="fas fa-check fa-2x text-gray-300"></i>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

	    <!-- Earnings (Monthly) Card Example -->
	    <div class="col-xl-3 col-md-6 mb-4">
	        <div class="card border-left-info shadow h-100 py-2">
	            <div class="card-body">
	                <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Categories
	                        </div>
	                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($categories)}}</div>
	                    </div>
	                    <div class="col-auto">
	                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

	    <!-- Pending Requests Card Example -->
	    <div class="col-xl-3 col-md-6 mb-4">
	        <div class="card border-left-warning shadow h-100 py-2">
	            <div class="card-body">
	                <div class="row no-gutters align-items-center">
	                    <div class="col mr-2">
	                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
	                            Unapproved (Products)</div>
	                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($unapproved_products)}}</div>
	                    </div>
	                    <div class="col-auto">
	                        <i class="fas fa-comments fa-2x text-gray-300"></i>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- Content Row -->

	<div class="row mt-2">
		<div class="col-md-4">
			<div class="card border border-bottom-success shadow">
				<div class="card-body">
					<div class="row text-center">
						<div class="col-md-12">
							<img style="height: 80px;" class="img-fluid rounded-circle border border-success p-1" src="/staff-assets/img/undraw_profile.svg" alt="">
							<h4 class="mt-2">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h4>
							<small>{{Auth::user()->email}}</small>
							<div class="table-responsive">
								<table class="table mt-3">
									<thead>
										<th>Role</th>
										<th>Status</th>
										<th>Registered</th>
									</thead>
									<tbody>
										<tr>
											<td>
												<span class="badge badge-info">Staff</span>
											</td>
											<td><span class="badge badge-success">Active</span></td>
											<td>{{Auth::user()->created_at}}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card border border-bottom-info shadow mt-3">
				<div class="card-body">
					<h5>Last Activity</h5>
					<hr>
					@foreach($latest_product as $product)
					<div class="row">
						<div class="col-md-9">
							<p>Product Created</p>
						</div>
						<div class="col-md-3">
							<span class="badge badge-info">{{$product->created_at->diffForHumans()}}</span>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card shadow">
				<div class="card-body">
					<h4>Recent Products</h4>
					<div class="table-responsive">
						<table class="table mt-2">
							<thead>
								<th>Photo</th>
								<th>Name</th>
								<th>Company</th>
								<th>Category</th>
								<th>Subcategory</th>
								<th>Status</th>
								<th>Created</th>
								<th>Actions</th>
							</thead>
							<tbody>
								@foreach($products as $product)
								<tr>
									<td>
										<img class="border border-success rounded-circle p-1" src="{{$product->photo->file}}" height="50" alt="">
									</td>
									<td>{{$product->name}}</td>
									<td>{{$product->company}}</td>
									<td>{{$product->category->name}}</td>
									<td>{{$product->subcategory->name}}</td>
									@if($product->is_publish == 1)
										<td>
											<span class="badge badge-success">Approved</span>
										</td>
									@else
									<td>
										<span class="badge badge-warning">Unapprove</span>
									</td>
									@endif
									<td>{{$product->created_at->diffForHumans()}}</td>
									<td>
										<a href="{{ route('staff.product.details', $product->id) }}" class="btn btn-primary btn-sm">
											<i class="fas fa-eye"></i>
										</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection