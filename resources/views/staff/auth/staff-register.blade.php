@extends('layouts.master')
@section('content')

<!-- Content -->
<div class="content clearfix">

	<!-- Login Section -->
	<div class="section-block replicable-content clear-height bkg-heavy-rain-gradient">
		<div class="row flex v-align-middle">
			<div class="column width-6 offset-3">
				<div>
					<div class="logo mb-50">
						<div class="logo-inner center">
							<a href="{{ url('/') }}"><img src="/assets/images/logo-dark.png" width="125" alt="Faulkner Logo" /></a>
						</div>
					</div>
					<div class="signup-box box rounded xlarge bkg-white shadow">
						<h3 class="center">Register an Account</h3>
						<p class="mb-20 center">Already have an account? <a href="{{route('staff.login')}}" class="fade-location">Click Here</a></p>
						<div class="register-form-container">
							<div class="divider center mt-40 mb-50"></div>
							<form class="register-form" method="POST" action="{{route('staff.register.submit')}}" novalidate>
								@csrf
								<div class="row merged-form-elements">
									<div class="column width-6">
										<div class="field-wrapper">
											<label class="color-charcoal">First Name:</label>
											<input type="text" name="firstname" class="form-firstname form-element rounded medium @error('firstname') is-invalid @enderror" value="{{old('firstname')}}" placeholder="Firstname" required>
											@error('firstname')
	                                            <span class="form-error-message invalid-feedback" role="alert">
	                                                <i class="fas fa-exclamation-circle"></i> <strong>{{ $message }}</strong>
	                                            </span>
	                                        @enderror
										</div>
									</div>
									<div class="column width-6">
										<div class="field-wrapper">
											<label class="color-charcoal">Last Name:</label>
											<input type="text" name="lastname" class="form-lastname form-element rounded medium @error('lastname') is_invalid @enderror" value="{{old('lastname')}}" placeholder="Lastname" required>
											@error('lastname')
											    <span class="form-error-message invalid-feedback" role="alert">
	                      	                          <i class="fas fa-exclamation-circle"></i> <strong>{{ $message }}</strong>
	                                            </span>
	                                        @enderror
										</div>
									</div>
								</div>
								<div class="row">
									<div class="column width-12">
										<div class="field-wrapper">
											<label class="color-charcoal">Email:</label>
											<input type="email" name="email" class="form-email form-element rounded medium @error('email') is_invalid @enderror" value="{{old('email')}}" placeholder="Enter your email" required>
											@error('email')
											    <span class="form-error-message invalid-feedback" role="alert">
	                                                <i class="fas fa-exclamation-circle"></i> <strong>{{ $message }}</strong>
	                                            </span>
	                                        @enderror
										</div>
									</div>
									<div class="column width-12">
										<div class="field-wrapper">
											<label class="color-charcoal">Password:</label>
											<input type="password" name="password" class="form-password form-element rounded medium @error('email') is_invalid @enderror" placeholder="password (8 or more characters)" required>
										</div>
										@error('password')
										    <span class="form-error-message invalid-feedback" role="alert">
                                                <i class="fas fa-exclamation-circle"></i> <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									<div class="column width-12 mt-10 center">
										<button class="form-submit button rounded medium bkg-green bkg-hover-theme bkg-focus-green color-white color-hover-white no-margins">Create Account</button>
									</div>
								</div>
							</form>
							<p class="text-small mt-20 center">By creating an account you agree to our terms - <a href="#">Read More</a></p>
							<div class="form-response show"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Login Section End -->

	<!-- Subscribe Advanced Modal End -->
	<div id="subscribe-modal" class="section-block pt-0 pb-30 background-none hide">
		
		<!-- Intro Title Section 2 -->
		<div class="section-block intro-title-2-1 xsmall bkg-grey-ultralight">
			<div class="media-overlay bkg-black opacity-03"></div>
			<div class="row">
				<div class="column width-12">
					<div class="title-container">
						<div class="title-container-inner center color-white">
							<h1 class="title-medium mb-0">Subscribe To Newsletter</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Intro Title Section 2 End -->

		<!-- Signup -->
		<div class="section-block pt-60 pb-0">
			<div class="row">
				<div class="column width-12 center">
					<div class="signup-form-container">
						<div class="row">
							<div class="column width-10 offset-1">
								<p>Subscribe to our monthly newsletter and get the latest news from Kant. You can unsubscribe at any time.</p>
							</div>
						</div>
						<form class="signup-form merged-form-elements" action="php/subscribe.php" method="post" novalidate>
							<div class="row">
								<div class="column width-8">
									<div class="field-wrapper">
										<input type="email" name="email" class="form-email form-element rounded medium left" placeholder="Email address*" tabindex="2" required>
									</div>
								</div>
								<div class="column width-4">
									<input type="submit" value="Subscribe" class="form-submit button rounded large bkg-theme bkg-hover-green color-white color-hover-white">
								</div>
							</div>
							<input type="text" name="honeypot" class="form-honeypot form-element">
						</form>
						<div class="form-response show"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- Signup End -->

	</div>
	<!-- Subscribe Advanced Modal End -->

</div>
<!-- Content End -->

@endsection