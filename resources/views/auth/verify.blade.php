@extends('layouts.partials')
@section('partial')

<!-- Header -->
<header class="header header-absolute header-fixed-on-mobile" data-bkg-threshold="100" data-sticky-threshold="0">
    <div class="header-inner">
        <div class="row nav-bar">
            <div class="column width-12 nav-bar-inner">
                <div class="logo">
                    <div class="logo-inner">
                        <a href="{{ url('/') }}"><img src="/assets/images/logo-dark.png" alt="Faulkner Logo" /></a>
                        <a href="{{ url('/') }}"><img src="/assets/images/logo.png" alt="Faulkner Logo" /></a>
                    </div>
                </div>
                <nav class="navigation nav-block secondary-navigation nav-right">
                    <ul>
                        <li>
                            <!-- Button -->
                            <div class="v-align-middle">
                                <a href="contact-style-two.html" class="weight-semi-bold color-green">Need Support?</a>
                            </div>
                        </li>
                        <li class="aux-navigation hide">
                            <!-- Aux Navigation -->
                            <a href="#" class="navigation-show side-nav-show nav-icon">
                                <span class="icon-menu"></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->

<div class="content clearfix">
<!-- Maintenance Section -->
<div class="section-block bkg-green pt-150">
    <div class="row mt-50">
        <div class="column width-8 offset-2 center">
            <h1 class="title-xlarge color-white">Verify Your Email!</h1>
            <p class="title-medium color-white">We have sent an verification link to your email.<br>Kindly verify your email</p>
            <p class="color-white">Haven't receive a email?</p>
            @if(Session('resent'))
                <div role="alert">  
                    <p class="color-white">New email has been sent!</p>
                </div>
            @endif
             <form method="POST" action="{{ route('verification.resend') }}">
                 @csrf
                 <button type="submit">Resend</button>      
             </form>
        </div>
    </div>
</div>
<!-- Maintenance Section End -->

<footer class="footer footer-light with-border">
<div class="footer-top">
    <div class="row">
        <div class="column width-6 push-6">
            <div class="widget right center-on-mobile">
                <div class="footer-logo">
                    <a href="{{ url('/') }}"><img src="/assets/images/logo-dark.png" alt="Faulkner Logo" /></a>
                </div>
                <div class="clear"></div>
                <p class="mb-0">&copy; Virtual Pharmacy. All Rights Reserved.</p>
            </div>
        </div>
        <div class="column width-6 pull-6">
            <div class="row flex two-columns-on-tablet">
                <div class="column width-4">
                    <div class="widget left center-on-mobile">
                        <h3 class="widget-title mb-30">Pharmaceuticals</h3>
                        <ul>
                            <li><a href="#">Blood Pressure</a></li>
                            <li><a href="#">Diabetes</a></li>
                            <li><a href="#">Depression</a></li>
                        </ul>
                    </div>
                </div>
                <div class="column width-4">
                    <div class="widget left center-on-mobile">
                        <h3 class="widget-title mb-30">Trending</h3>
                        <ul>
                            <li><a href="#">Nutritions & Vitamins</a></li>
                            <li><a href="#">Gym & Fitness</a></li>
                            <li><a href="#">Women Care</a></li>
                        </ul>
                    </div>
                </div>
                <div class="column width-4">
                    <div class="widget left center-on-mobile">
                        <h3 class="widget-title mb-30">Company</h3>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Terms & Policies</a></li>
                            <li><a href="#">Faq</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>

</div>

@endsection  
