@extends('layouts.staff-master')
@section('content')

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
    	<h1 class="h3 mb-0 text-gray-800">My approved products</h1>
	</div>
</div>

<div class="container-fluid">
	<div class="row mb-4">
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-body">
					<h4>Approved Products</h4>

					@if(count($approved_products) > 0)
					<div class="table-responsive">
						<table class="table mt-2">
							<thead>
								<th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>PDF</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Approval</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Actions</th>
							</thead>
							<tbody>
								@foreach($approved_products as $product)
								<tr>
									<td>{{$product->id}}</td>
									<td><img src="{{$product->photo->file}}" height="50px" alt=""></td>
									<td>{{$product->name}}</td>
									<td>{{$product->company}}</td>
									<td>{{$product->category->name}}</td>
									<td>{{$product->subcategory->name}}</td>
									<td><a href="{{$product->pdf->file}}">Description</a></td>
                                    <td>{{$product->stock}}</td>
                                    <td>{{$product->price}} Rs</td>
                                    <td>
                                        <span class="badge badge-success">Approved</span>
                                    </td>
                                    <td>{{$product->created_at->diffForHumans()}}</td>
                                    <td>{{$product->updated_at->diffForHumans()}}</td>
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
					@else
						<div class="row mt-5 text-center">
							<div class="col-md-12">
								<img style="height: 300px;" src="/assets/images/shop/grid/large-margins/no-data.svg" alt="">
							</div>
							<div class="col-md-12 mt-3">
								<h4>No current approved products</h4>
							</div>
							<div class="col-md-12 mt-2">
								<a href="{{ route('add.product.page') }}" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Create product</span>
                                </a>
							</div>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection