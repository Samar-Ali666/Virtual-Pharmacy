@extends('layouts.master')
@section('content')
	<!-- Content -->
<div class="content clearfix">

<!-- Intro Title Section 1 -->
<div class="mt-100 section-block intro-title-1 small">
	<div class="row">
		<div class="column width-12">
			<div class="title-container">
				<div class="title-container-inner">
					<div class="row flex">
						<div class="column width-6 v-align-middle">
							<div>
								<h1 class="mb-0">All {{$category->name}}</h1>
								<p class="lead mb-0 mb-mobile-20">All products from top-of-the-line companies &amp; vendors</p>
								<div class="row flex mt-20">
									<form action="{{ route('shop.search') }}" method="post">
										@csrf
										<div class="column width-9">
										<input type="text" name="search" class="form-password form-element rounded medium" placeholder="product or brand name" required>
									</div>	
									<div class="column width-3">
										<button class="form-submit button rounded  bkg-green bkg-hover-theme  bkg-focus-green color-white color-hover-white mb-0">
											<i class="fas fa-search"></i>
										</button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<div class="column width-6 v-align-middle">
							<div>
								<ul class="breadcrumb mb-0 pull-right clear-float-on-mobile">
									<li>
										<a href="{{ url('/') }}">Home</a>
									</li>
									<li>
										Shop
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Intro Title Section 1 End -->

<!-- Filter Menu -->
@if(count($products) > 0)
<div class="section-block pt-0 pb-0 grid-filter-dropdown">
	<div class="freeze pt-10 bkg-white" data-extra-space-top="80" data-extra-space-bottom="0">
		<div class="row">
			<div class="column width-12">
				<div class="filter-menu-inner">
					<div class="row flex">
						<div class="column width-8 v-align-middle">
							<div class="product-result-count">
								<p class="mb-0 mb-mobile-30">Showing <strong>{{$category->name}}</strong> related results</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif	
<!-- Filter Menu End -->

<!-- Product Grid -->
<div id="product-grid" class="section-block grid-container products fade-in-progressively pt-30 pb-0" data-layout-mode="masonry" data-grid-ratio="1.5" data-animate-resize data-animate-resize-duration="0">
	<div class="row">
		<div class="column width-12">
			<div class="row grid content-grid-4">
				@if(count($products) > 0)
				@foreach($products as $product)
				<div class="grid-item product grid-sizer">
					<div class="thumbnail rounded product-thumbnail border-grey-light img-scale-in" data-hover-easing="easeInOut" data-hover-speed="700" data-hover-bkg-color="#ffffff" data-hover-bkg-opacity="0.9">
						<a class="overlay-link" href="{{ route('product.single', $product->id) }}">
							<img src="{{$product->photo->file}}" alt=""/>
							<span class="overlay-info">
								<span>
									<span>
										View
									</span>
								</span>
							</span>
						</a>
						<div class="product-actions center">
							<form action="{{ route('product.cart.add') }}" method="POST">
							@csrf
							<input type="hidden" name="product_id" value="{{$product->id}}">
							<input type="hidden" name="quantity" value="1">
							<button class="button add-to-cart-button rounded small">Add To Cart</button>
							</form>
						</div>
					</div>
					<div class="product-details center">
						<h3 class="product-title text-truncate">
							<a href="{{ route('product.single', $product->id) }}">
								{{$product->name}}
							</a>
						</h3>
						<span class="product-price price"><ins><a href="{{$product->pdf->file}}" target="_blank">
							Read Description</a></ins></span><br>
						<span class="product-price price"><ins><span class="amount">
							{{$product->company}}</span></ins></span><br>
						<span class="product-price price"><ins><span class="amount">PKR {{$product->price}}</span></ins></span>
						<div class="product-actions-mobile">
							<a href="#" class="button add-to-cart-button rounded small">Add To Cart</a>
						</div>
					</div>
				</div>
				@endforeach
				@else
				<div class="row">
	                <div class="column widht-12 center">
	                    <img src="/assets/images/shop/grid/large-margins/no-products.svg" width="300" alt="">
	                </div>
	                </div>
	                <div class="row">
	                    <div class="column width-12 center pt-10">
	                        <h2>No products in this category yet.</h2>
	                    </div>
	                </div>
				@endif
			</div>
		</div>
	</div>
</div>
<!-- Product Grid End -->

<!-- Pagination Section 3 -->
<div class="section-block pagination-3">
	<div class="row">
		<div class="column width-12">
			<ul>
				{{$products->links()}}
			</ul>
		</div>
	</div>
</div>
<!-- Pagination Section 3 End -->

</div>
<!-- Content End -->
</div>

@endsection