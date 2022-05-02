@extends('layouts.master')
@section('content')

<!-- Content -->
<div class="content clearfix">

<!-- Intro Title Section 1 -->
<div class="mt-50 section-block intro-title-1 small">
	<div class="row">
		<div class="column width-6 offset-3">
			<div class="title-container">
				<div class="title-container-inner center left-on-mobile">
					<h1 class="mb-0">Checkout</h1>
					<p class="lead mb-0 mb-mobile-20">Verify Your Purchase</p>
					<ul class="breadcrumb center left-on-mobile pd-60 mb-0">
						<li>
							<a>Shop</a>
						</li>
						<li>
							<a href="{{ route('user.cart') }}">Cart</a>
						</li>
						<li>
							Checkout
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Intro Title Section 1 End -->

<!-- Checkout -->
<div class="section-block pt-0">
	<div class="row one-column-on-tablet">
		<div class="column width-6 offset-3">
			
			<div class="with-background">
	
				<!-- Cart Overview and Totals -->
				<div class="row">
					<div class="column width-12">
						<div class="cart-overview">
							<table class="table non-responsive rounded large mb-60">
								<thead>
									<tr>
										<th class="product-details">Product</th>
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
													<a href="#" class="product-title">{{$cart->product->name}}</a>
													<span class="product-description"><em>{{$cart->product->category->name}}</em></span>
												</span>
											</span>
										</td>
										<td class="product-subtotal right">
											<span class="amount">PKR {{$cart->product->price}}.00</span>
											<span class="product-description">x <em>{{$cart->quantity}}</em></span>
										</td>
									</tr>
									@endforeach
									@if($cart_price > 5000)
									<tr class="cart-order-tax right">
										<td colspan="2">Discount: <span class="amount">5% discount on above 5,000 purchase</span></td>
										
									</tr>
									<tr class="cart-order-total right">
										<td colspan="2">Discounted total: <span class="amount">{{$cart_price}}</span> PKR</td>
									</tr>
									@else
									<tr class="cart-order-total right">
										<td colspan="2">total: <span class="amount">{{$cart_price}}</span> PKR</td>
									</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- Cart Overview and Totals End -->

				<div class="row full-width collapse">
					<div class="column width-12">
						<hr class="mb-20">
					</div>
				</div>
		
				<!-- Billing Form -->
				<div class="billing-details">
					<div class="billing-form-container">
						<form class="billing-form" action="{{ route('user.place.order') }}" method="POST">
							@csrf
							<!-- User Address -->
							<div class="row">
								<div class="column width-12">
									<h4 class="mb-30">Shipping Address</h4>
									<div class="tabs button-nav rounded small bordered left mb-20">
										<div class="tab-panes">
											<div id="tabs-credit-card" class="active animate">
												<div class="tab-content">
													<div class="row">
														<div class="column width-6">
															<div class="field-wrapper">
																<input type="text" name="fname" class="form-fname form-element rounded medium" placeholder="First Name" value="{{Auth::user()->firstname}}" disabled="disabled">
															</div>
														</div>
														<div class="column width-6">
															<div class="field-wrapper">
																<input type="text" name="lname" class="form-lname form-element rounded medium" placeholder="Last Name" value="{{Auth::user()->lastname}}" disabled="disabled">
															</div>
														</div>
														<div class="column width-12">
															<div class="row">
																<div class="column width-12">
																	<div class="field-wrapper">
																		<input type="email" name="email" class="form-email form-element rounded medium" placeholder="Email address" value="{{Auth::user()->email}}" disabled="disabled">
																	</div>
																</div>
														<div class="column width-12">
															<div class="row">
																<div class="column width-6">
																	<div class="form-select form-element rounded medium" tabindex="2">
																		<select name="country" @error('country') is-invalid @enderror) required="required">
																			<option selected="selected" value="">Select Country</option>
																			<option value="pakistan">Pakistan</option>
																		</select>
																	</div>
																		@error('country')
							                                            <span class="form-error-message invalid-feedback" role="alert">
							                                                <i class="fas fa-exclamation-circle"></i> <strong>{{ $message }}</strong>
							                                            </span>
							                                        @enderror
																</div>
																<div class="column width-6">
															<div class="field-wrapper">
																<input type="text" name="city" @error('city') is-invalid @enderror class="form-wesite form-element rounded medium" placeholder="City" tabindex="4" required="required">
															</div>
																@error('city')
					                                            <span class="form-error-message invalid-feedback" role="alert">
					                                                <i class="fas fa-exclamation-circle"></i> <strong>{{ $message }}</strong>
					                                            </span>
					                                        @enderror
														</div>
															</div>
														</div>
														<div class="column width-12">
															<div class="field-wrapper">
																<input type="text" name="phone" @error('phone') is-invalid @enderror class="form-email form-element rounded medium" placeholder="Enter phone number" required="required">
															</div>
																@error('phone')
					                                            <span class="form-error-message invalid-feedback" role="alert">
					                                                <i class="fas fa-exclamation-circle"></i> <strong>{{ $message }}</strong>
					                                            </span>
					                                        @enderror
														</div>
														<div class="column width-12">
															<div class="field-wrapper">
																<textarea name="address" @error('address') is-invalid @enderror class="form-message form-element rounded medium" placeholder="Enter address*" tabindex="7" required="required"></textarea>
															</div>
																@error('address')
					                                            <span class="form-error-message invalid-feedback" role="alert">
					                                                <i class="fas fa-exclamation-circle"></i> <strong>{{ $message }}</strong>
					                                            </span>
					                                        @enderror
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								
								</div>
							</div>
							<!-- Payment Method End -->

							<!-- Submit Payment -->
							<div class="row">
								<div class="column width-12 center">
									<button type="submit" class="form-submit button rounded medium bkg-theme bkg-hover-theme color-white color-hover-white mb-0" tabindex="8">Place order</button>
								</div>
							</div>
							<!-- Submit Payment End -->

						</form>
					</div>
				</div>
				<!-- Billing Form End -->

			</div>

		</div>
	</div>
	<!-- Checkout End -->

</div>

<!-- CVV Modal -->
<div id="cvv-modal" class="modal-dialog-inner section-block cart-overview pt-0 pb-30 background-none hide">
	<div class="modal-header bkg-green color-white">
		<h4 class="modal-header-title">Locating CVV</h4>
	</div>
	
	<div class="thumbnail">
		<img src="images/generic/cvv-credit-card.jpeg" width="300" alt="">
	</div>
	<p>The CVV of your credit card can be found at the back of your credit card, as indicated in the image above.</p>

	<!-- Aux Close -->
	<div class="row">
		<div class="column width-12 center">
			<a href="#" class="tml-aux-exit button rounded medium bkg-theme bkg-hover-theme color-white color-hover-white no-margin-right">Yup, got it!</a>
		</div>
	</div>
	<!-- Aux Close End -->

</div>
<!-- CVV Modal End -->

</div>
<!-- Content End -->

@endsection