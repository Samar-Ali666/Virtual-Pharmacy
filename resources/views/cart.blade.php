@extends('layouts.master')
@section('content')

<!-- Content -->
<div class="content clearfix">

	<!-- Intro Title Section 1 -->
	<div class="mt-50 section-block intro-title-1 small">
		<div class="row">
			<div class="column width-10 offset-1">
				<div class="title-container">
					<div class="title-container-inner">
						<div class="row flex">
							<div class="column width-6 v-align-middle">
								<div>
									<h1 class="mb-0">Cart Overview</h1>
									<p class="lead mb-0 mb-mobile-20">Verify Your Purchase</p>
								</div>
							</div>
							<div class="column width-6 v-align-middle">
								<div>
									<ul class="breadcrumb mb-0 pull-right clear-float-on-mobile">
										<li>
											<a>Shop</a>
										</li>
										<li>
											Cart
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

	<!-- Cart -->
	<div class="section-block pt-0">
		<div class="row">
			<div class="column width-10 offset-1">

				<div class="with-background">

					<!-- Cart Message -->
					<div class="row">
						<div class="column width-12">
							<p class="lead">You have <span class="item-number weight-bold">{{count($cart_products)}}</span> items in your cart, for a subtotal of <span class="cart-subtotal weight-bold">PKR	 {{$cart_price}}</span>.</p>
							@if($cart_price > 5000)
							<p class="">-5% discount on shopping above 5,000 <PKR></PKR></p>
							@endif
						</div>
						<div class="column width-12">
							<hr>
						</div>
					</div>
					<!-- Cart Message End -->

					<!-- Cart Overview -->
					<div class="row">
						<div class="column width-12">
							<div class="cart-overview">
								<table class="table non-responsive rounded large">
									<thead>
										<tr>
											<th class="product-details">Product</th>
											<th class="product-quantity">Quantity</th>
											<th class="product-subtotal right">Price</th>
										</tr>
									</thead>
									<tbody>
										@foreach($cart_products as $cart)
										<tr class="cart-item">
											<td class="product-details">
												<span>
													<img src="{{$cart->product->photo->file}}" class="rounded" width="60" alt=""/>
													<span>
														<a href="{{ route('product.single', $cart->product->id) }}" class="product-title">{{$cart->product->name}}</a>
														<span class="product-description"><em>{{$cart->product->category->name}} <span class="amount">- PKR {{$cart->product->price}}</span></em></span>
														<form action="{{ route('product.cart.remove', $cart->id) }}" method="POST">
															@csrf
															@method('DELETE')
															<button href="" class="product-remove">Remove</button>
														</form>
													</span>
												</span>
											</td>
											<td class="product-quantity">
												<h4>{{$cart->quantity}}</h4>
											</td>
											<td class="product-subtotal right">
												<span class="amount">PKR {{$cart->product->price}}.00</span>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- Cart Overview End -->


					<!-- Proceed to Checkout -->
					<div class="row">
						<div class="column width-12 right">
							<a href="{{ route('user.checkout') }}" class="form-submit button rounded medium bkg-theme bkg-hover-theme color-white color-hover-white no-margins" tabindex="6">
								Proceed to Checkout
							</a>
						</div>
					</div>
					<!-- Proceed to Checkout End -->

				</div>
			</div>
		</div>
	</div>
	<!-- Cart End -->

</div>
<!-- Content End -->

@endsection