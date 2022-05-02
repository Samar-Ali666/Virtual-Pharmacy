@extends('layouts.master')
@section('content')

<!-- Content -->
<div class="content clearfix">

<!-- Login Section -->
<div class="section-block replicable-content">
    <div class="row flex">
        <div class="column width-5 offset-1 push-6 v-align-middle">
            <div>
                <h2>Get your items at your doorsteps with virtual pharmacy</h2>
                <ul class="list-unstyled">
                    <li><span class="icon-check color-green"></span> 100% Pure & Original.</li>
                    <li><span class="icon-check color-green"></span> Authorizd companies.</li>
                    <li><span class="icon-check color-green"></span> Branded healthcare items.</li>
                    <li><span class="icon-check color-green"></span> Payment on delivery.</li>
                </ul>
                <hr>
                <div class="thumbnail circle pull-left" data-hover-easing="easeInOut" data-hover-speed="500" data-hover-bkg-color="#000000" data-hover-bkg-opacity="0.01">
                    <img src="https://randomuser.me/api/portraits/men/10.jpg" width="60" height="60" alt=""/>
                </div>
                <div>
                    <h4 class="mb-10">Kay Casey <span class="opacity-05">Pharmacy Support</span></h4>
                    <p>We are here to provide you exellence with ease read our terms and policies for more information  .</p>
                    <p><a href="#">Terms & Policies &rarr;</a></p>
                </div>
            </div>
        </div>
        <div class="column width-6 pull-6">
            <div>
                <div class="signup-box box rounded xlarge shadow bkg-white">
                    <h3>Sign in to continue</h3>
                    <p class="mb-20">Need a customer account? <a href="{{ route('register') }}" class="fade-location">Click Here</a></p>
                    <p class="mb-20">Staff member? <a href="{{ route('staff.login') }}" class="fade-location">Sign in here</a></p>
                    <div class="login-form-container">
                        <form class="login-form" method="POST" action="{{ route('login') }}" novalidate>
                            @csrf
                            <div class="row">
                                <div class="column width-12">
                                    <div class="field-wrapper">
                                        <label class="color-charcoal">Username/Email:</label>
                                        <input type="text" id="email" class="form-username form-element rounded medium" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
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
                                        <input type="password" name="password" class="form-password form-element rounded medium" @error('password') is-invalid @enderror placeholder="Enter your password" required>
                                        @error('password')
                                            <span class="form-error-message invalid-feedback" role="alert">
                                               <i class="fas fa-exclamation-circle"></i> <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="column width-12">
                                    <div class="field-wrapper pt-0 pb-20">
                                        <input id="checkbox-1" class="form-element checkbox rounded" name="remember" type="checkbox" required>
                                        <label for="checkbox-1" name="remember" id="remember" class="checkbox-label no-margins" {{ old('remember') ? 'checked' : '' }}>Remember Me</label>
                                    </div>
                                </div>
                                <div class="column width-12">
                                    <input type="submit" value="Sign In" class="form-submit button rounded medium bkg-green bkg-hover-theme bkg-focus-green color-white color-hover-white mb-0">
                                </div>
                            </div>
                        </form>
                        <p class="text-small mt-20 mb-0">I forgot my password - <a href="#">Remind me</a></p>
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