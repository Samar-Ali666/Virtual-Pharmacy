@extends('layouts.master')
@section('content')

<!-- Content -->
<div class="content clearfix">

	<!-- Intro Title Section 1 -->
	<div class="mt-50 section-block intro-title-1 small">
		<div class="row">
			<div class="column width-12">
				<div class="title-container">
					<div class="title-container-inner">
						<div class="row flex">
							<div class="column width-6 v-align-middle">
								<div>
									<h1 class="mb-0">{{$product->name}}</h1>
									<p class="lead mb-0 mb-mobile-20">{{$product->company}}</p>
								</div>
							</div>
							<div class="column width-6 v-align-middle">
								<div>
									<ul class="breadcrumb mb-0 pull-right clear-float-on-mobile">
										<li>
											<a href="#">Home</a>
										</li>
										<li>
											{{$product->category->name}}
										</li>
										<li>
											{{$product->subcategory->name}}
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

	<div class="section-block clearfix pt-0">
		<div class="row">

			<!-- Content Inner -->
			<div class="column width-8 content-inner">

				<!-- Product Images -->
				<div class="row">
					<div class="column width-12">
						<div class="product freeze" data-extra-space-top="100" data-extra-space-bottom="90" data-push-section=".products-similar" data-width="730" data-height="641">
							<div class="product-images">
								<div class="tm-slider-container content-slider mb-0" data-animation="slide" data-scale-min-height="100" data-scale-under="1080" data-width="1080" data-height="800" data-nav-show-on-hover="false">
									<ul class="tms-slides">
										<li class="tms-slide" data-image data-force-fit data-nav-dark data-as-bkg-image>
											<img data-src="{{$product->photo->file}}" alt=""/>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Product Images -->
			
			</div>
			<!-- Content Inner End -->

			<!-- Sidebar -->
			<aside class="column width-4 sidebar right">
				<div class="sidebar-inner">
					<div class="product-summary">
						<div class="row">
							<div class="column width-12">

								<!-- Product Price -->
								<div class="product-price price">
									<ins><span class="amount">PKR {{$product->price}}.00</span></ins>
								</div>
								<!-- Product Price End --> 

								<!-- Product Description -->
								<div class="product-description">
									<hr class="mt-0">
									<p>{{\Illuminate\Support\Str::limit($product->description, 200)}}</p>
									<a href="{{$product->pdf->file}}" target="_blank">Read Full Description &rarr;</a>
								</div>
								<!-- Product Description End -->

								<!-- Product Specs -->
								<div class="product-specs mb-10">
									<hr>
									<h4>Stock Available</h4>
										<div class="row">
											<div class="column width-12">
												<h4>{{$product->stock}}</h4>
											</div>
										</div>
										<hr>
										<form action="{{ route('product.cart.add') }}" method="POST">
										@csrf
										<div class="row merged-form-elements">
											<input type="hidden" name="product_id" value="{{$product->id}}">	
											<div class="column width-5">
												<input type="text" name="quantity" class="form-quantity form-element medium" placeholder="Qty">
											</div>
											<div class="column width-7">
												<input type="submit" value="Add To Cart" class="form-submit button full-width rounded medium bkg-theme bkg-hover-theme color-white color-hover-white" tabindex="5">
											</div>
										</div>
										</form>
									</form>
								</div>
								<!-- Product Specs -->

							</div>
						</div>
					</div>
				</div>
			</aside>
			<!-- Sidebar End -->

			<!-- Products Similar -->
			<div class="column width-12">
				<div class="products-similar">
					<hr>
					<h3 class="mb-50">Related Products</h3>
					<div id="product-grid" class="grid-container products fade-in-progressively no-padding-top" data-layout-mode="masonry" data-grid-ratio="1.5" data-animate-resize data-animate-resize-duration="0">
						<div class="row">
							<div class="column width-12">
								<div class="row grid content-grid-3">
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
												<a href="#" class="button add-to-cart-button rounded small">Add To Cart</a>
											</div>
										</div>
										<div class="product-details center">
											<h3 class="product-title text-truncate">
												<a href="#">
													{{$product->name}}
												</a>
											</h3><span class="amount">PKR {{$product->company}}</span><br>
										</h3><a href="{{$product->pdf->file}}" class="amount" target="_blank">Read Description</a><br>
											</h3><span class="amount">PKR {{$product->price}}</span></span>
											<div class="product-actions-mobile">
												<a href="#" class="button add-to-cart-button rounded small">Add To Cart</a>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Products Similar End -->

		</div>
	</div>
</div>
<!-- Content End -->

@endsection