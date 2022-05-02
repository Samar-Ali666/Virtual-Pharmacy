@extends('layouts.staff-master')
@section('content')

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
    	<h1 class="h3 mb-0 text-gray-800">Awaiting for approval</h1>
	</div>
</div>

<div class="container-fluid">
	<div class="row mb-4">
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-body">
					<h4>Pending Products</h4>

					@if(count($pending_products) > 0)
					<div class="table-responsive">
						<table class="table table-bordered data-table mt-2">
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
							<tbody></tbody>
						</table>
					</div>
					@else
					<div class="row mt-5 text-center">
						<div class="col-md-12">
							<img style="height: 300px;" src="/assets/images/shop/grid/large-margins/no-data.svg" alt="">
						</div>
						<div class="col-md-12 mt-3">
							<h4>No current pending products</h4>
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

@section('scripts')

<script>
	$(function(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		var table = $('.data-table').DataTable({
			serverSide: true,
			processing: true,
			ajax: "{{ route('staff.products.pending') }}",
			columns: [
				{data: 'DT_RowIndex', name: 'DT_RowIndex'},
				{data: 'photo', name: 'photo.file'},
				{data: 'name', name: 'name'},
				{data: 'company', name: 'company'},
				{data: 'category',  name:'category.name'},
				{data: 'subcategory',  name:'subcategory.name'},
				{data: 'pdf', name: 'pdf.file'},
				{data: 'stock', name: 'stock'},
				{data: 'price', name: 'price'},
				{data: 'is_publish', name: 'is_publish'},
				{data: 'created_at', name: 'created_at'},
				{data: 'updated_at', name: 'updated_at'},
				{data: 'action', name: 'action'}
			]
		});
	});
</script>

@endsection