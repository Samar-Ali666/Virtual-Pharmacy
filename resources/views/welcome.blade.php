@extends('layouts.master')
@section('content')

<!-- Content -->
<div class="content clearfix">

    <!-- Feature 1 Section -->
    <div class="section-block feature-1 overlap-bottom pb-0 bkg-ash">
        <div class="row">
            <div class="column width-12">
                <div class="feature-image">
                    <div class="thumbnail background-image-container large background-cover rounded shadow">
                        <img src="assets/images/shop/content-image-1.jpg" class="hide" alt="">
                        <div class="caption-over-outer">
                            <div class="caption-over-inner center color-white">
                                <div class="row">
                                    <div class="column width-8 offset-2">
                                        <h1>VIRTUAL PHARMACY</h1>
                                    </div>
                                    <div class="column width-6 offset-3">
                                        <p class="lead">We have the best collection of medicines, medical eqiupments and healthcare products</p>
                                        <a href="#product-grid" data-offset="-140" class="scroll-link button rounded medium no-margins bkg-theme bkg-hover-theme color-white color-hover-white mb-0">Start Shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature 1 Section End -->

    <!-- Filter Menu -->
    <div class="section-block pt-0 pb-0 grid-filter-dropdown" data-target-grid="#product-grid">
        <div class="freeze pt-10 bkg-white" data-extra-space-top="80" data-extra-space-bottom="0">
            <div class="row">
                <div class="column width-12">
                    <div class="filter-menu-inner">
                        <div class="row flex">
                            <div class="column width-8 v-align-middle">
                                <div class="product-result-count">
                                    <p class="mb-0 mb-mobile-30">Showing product results</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Filter Menu End -->

    <!-- Medicine Section Head -->
    <div class="row flex center pt-30">
        <div class="column width-12 v-align-middle">
            <div class="rounded xlarge">
                <div>
                    <h3>Medicines</h3>
                    <p>We have all kinds of medicnes for every medical issues.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Medicine Section Head End -->

    <!-- Medicine product grid caousel -->
    <div id="product-grid" class="section-block column width-12 grid-container products slider-column pt-30 fade-in-progressively">    
        <div class="row">
            <div class="column width-12">
                <div class="tm-slider-container recent-slider" data-nav-dark data-carousel-visible-slides="3" data-nav-keyboard="false" data-nav-pagination="false" data-nav-show-on-hover="false" data-carousel-1024="2">
                    <ul class="tms-slides"> 
                        @foreach($medicines_category as $category)
                        @foreach($category->product as $product)
                            <li class="tms-slide">
                            <div class="grid-item product grid-sizer cameras">
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
                                    <span class="product-price price"><ins><span class="amount">{{$product->company}}</span></ins></span><br>
                                    <span class="product-price price"><ins><span class="amount">PKR {{$product->price}}.00</span></ins></span>
                                    <div class="product-actions-mobile">
                                        <form action="{{ route('product.cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button class="button add-to-cart-button rounded small">Add To Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
    
    <!-- Medicine product grid caousel end -->

    <!-- Men's Care Section Head -->
    <div class="row flex center">
        <div class="column width-12 v-align-middle">
            <div class="rounded xlarge">
                <div>
                    <h3>Men's Care</h3>
                    <p>We have large variety of men's care items and cosmetics products.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Men's Care Section Head End -->

    <!-- Men's Care Product Grid -->
    <div id="product-grid" class="section-block column width-12 grid-container products slider-column pt-20 fade-in-progressively">    
        <div class="row">
            <div class="column width-12">
                <div class="tm-slider-container recent-slider" data-nav-dark data-carousel-visible-slides="3" data-nav-keyboard="false" data-nav-pagination="false" data-nav-show-on-hover="false" data-carousel-1024="2">
                    <ul class="tms-slides"> 
                        @foreach($mens_category as $category)
                        @foreach($category->product as $product)
                        <li class="tms-slide">
                            <div class="grid-item product grid-sizer cameras">
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
                                    <span class="product-price price"><ins><span class="amount">{{$product->company}}</span></ins></span><br>
                                    <span class="product-price price"><ins><span class="amount">PKR {{$product->price}}.00</span></ins></span>
                                    <div class="product-actions-mobile">
                                        <form action="{{ route('product.cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button class="button add-to-cart-button rounded small">Add To Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Men's Care Product Grid End -->

    <!-- Women Care Section Head -->
    <div class="row flex center">
        <div class="column width-12 v-align-middle">
            <div class="rounded xlarge">
                <div>
                    <h3>Women Care</h3>
                    <p>We have large variety of women care items and cosmetics products.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Women Care Section Head End -->

    <!-- Women Care Product Grid -->
    <div id="product-grid" class="section-block column width-12 grid-container products slider-column pt-20 fade-in-progressively">    
        <div class="row">
            <div class="column width-12">
                <div class="tm-slider-container recent-slider" data-nav-dark data-carousel-visible-slides="3" data-nav-keyboard="false" data-nav-pagination="false" data-nav-show-on-hover="false" data-carousel-1024="2">
                    <ul class="tms-slides"> 
                        @foreach($womens_category as $category)
                        @foreach($category->product as  $product)
                        <li class="tms-slide">
                            <div class="grid-item product grid-sizer cameras">
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
                                    <span class="product-price price"><ins><span class="amount">{{$product->company}}</span></ins></span><br>
                                    <span class="product-price price"><ins><span class="amount">PKR {{$product->price}}.00</span></ins></span>
                                    <div class="product-actions-mobile">
                                        <form action="{{ route('product.cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button class="button add-to-cart-button rounded small">Add To Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Women Care Product Grid End -->

    <!-- Gym & Fitness Section Head -->
    <div class="row flex center">
        <div class="column width-12 v-align-middle">
            <div class="rounded xlarge">
                <div>
                    <h3>Gym & Fitness</h3>
                    <p>Best and original supplements products for fitness</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Gym & Fitness Section Head End -->

    <!-- Gym & Fitness Product Grid -->
    <div id="product-grid" class="section-block column width-12 grid-container products slider-column pt-30 fade-in-progressively">    
        <div class="row">
            <div class="column width-12">
                <div class="tm-slider-container recent-slider" data-nav-dark data-carousel-visible-slides="3" data-nav-keyboard="false" data-nav-pagination="false" data-nav-show-on-hover="false" data-carousel-1024="2">
                    <ul class="tms-slides"> 
                        @foreach($gym_category as $category)
                        @foreach($category->product as $product)
                        <li class="tms-slide">
                            <div class="grid-item product grid-sizer cameras">
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
                                    <span class="product-price price"><ins><span class="amount">{{$product->company}}</span></ins></span><br>
                                    <span class="product-price price"><ins><span class="amount">PKR {{$product->price}}.00</span></ins></span>
                                    <div class="product-actions-mobile">
                                        <form action="{{ route('product.cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button class="button add-to-cart-button rounded small">Add To Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Gym & Fitness Product Grid End -->

    <!-- Testimonial Slider -->
    <div class="section-block bkg-grey-ultralight">
        <div class="row">
            <div class="column width-12 center">
                <h3 class="mb-50">What our customers keep coming back</h3>
            </div>
        </div>
        <div class="row full-width collapse">
            <div class="column width-12">
                <div class="tm-slider-container testimonial-slider" data-nav-dark>
                    <ul class="tms-slides"> 
                        <li class="tms-slide" data-image>
                            <div class="tms-content-scalable">
                                <div class="row flex boxes">
                                    <div class="column width-5 offset-1">
                                        <div class="box large rounded bkg-white horizon" data-animate-in="preset:scaleIn;duration:300ms;delay:0ms;">
                                            <div>
                                                <div class="thumbnail circle mb-10">
                                                    <img src="https://randomuser.me/api/portraits/men/12.jpg" width="60" alt="">
                                                </div>
                                                <a href="#" class="pull-right mt-10"><span>@KayneAndersson</span> <span class="icon-twitter small"></span></a>
                                            </div>
                                            <p>I frikin love Faulkner; they got the best selection of products. Telling everyone at my office about it -- super helpful. Great job! </p>
                                        </div>
                                    </div>
                                    <div class="column width-5">
                                        <div class="box large rounded bkg-white horizon" data-animate-in="preset:scaleIn;duration:300ms;delay:300ms;">
                                            <div>
                                                <div class="thumbnail circle mb-10">
                                                    <img src="https://randomuser.me/api/portraits/men/20.jpg" width="60" alt="">
                                                </div>
                                                <a href="#" class="pull-right mt-10"><span>@johnydoes</span> <span class="icon-twitter small"></span></a>
                                            </div>
                                            <p>Every now and then you find a great online store that offers something totally unique that you can't find anywhere else. Faulkner offers you great value for your money. Faulkner is awesome.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="tms-slide" data-image>
                            <div class="tms-content-scalable">
                                <div class="row flex boxes">
                                    <div class="column width-5 offset-1">
                                        <div class="box large rounded bkg-white horizon" data-animate-in="preset:scaleIn;duration:300ms;delay:0ms;">
                                            <div>
                                                <div class="thumbnail circle mb-10">
                                                    <img src="https://randomuser.me/api/portraits/men/21.jpg" width="60" alt="">
                                                </div>
                                                <a href="#" class="pull-right mt-10"><span>@emmajayne22</span> <span class="icon-twitter small"></span></a>
                                            </div>
                                            <p>The people at Faulkner really provide the best curated products out there. Looking for unique, on of a kind pieces, then this is the place to go. Fantastic.</p>
                                        </div>
                                    </div>
                                    <div class="column width-5">
                                        <div class="box large rounded bkg-white horizon" data-animate-in="preset:scaleIn;duration:300ms;delay:300ms;">
                                            <div>
                                                <div class="thumbnail circle mb-10">
                                                    <img src="https://randomuser.me/api/portraits/men/22.jpg" width="60" alt="">
                                                </div>
                                                <a href="#" class="pull-right mt-10"><span>@adamhenriksson</span> <span class="icon-twitter small"></span></a>
                                            </div>
                                            <p>If I had more money to spend, I'd purchase their entire catalog of products. Simply amazing things and great value.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="tms-slide" data-image>
                            <div class="tms-content-scalable">
                                <div class="row flex boxes">
                                    <div class="column width-5 offset-1">
                                        <div class="box large rounded bkg-white horizon" data-animate-in="preset:scaleIn;duration:300ms;delay:0ms;">
                                            <div>
                                                <div class="thumbnail circle mb-10">
                                                    <img src="https://randomuser.me/api/portraits/men/24.jpg" width="60" alt="">
                                                </div>
                                                <a href="#" class="pull-right mt-10"><span>@TripstersCo</span> <span class="icon-twitter small"></span></a>
                                            </div>
                                            <p>Amazing selection of products. I buy all my electronics from Faulkner, even my Apple devices. Keep up the great work people.</p>
                                        </div>
                                    </div>
                                    <div class="column width-5">
                                        <div class="box large rounded bkg-white horizon" data-animate-in="preset:scaleIn;duration:300ms;delay:300ms;">
                                            <div>
                                                <div class="thumbnail circle mb-10">
                                                    <img src="https://randomuser.me/api/portraits/men/26.jpg" width="60" alt="">
                                                </div>
                                                <a href="#" class="pull-right mt-10"><span>@gregoryhanes</span> <span class="icon-twitter small"></span></a>
                                            </div>
                                            <p>If you got money to spend, then Faulkner is great. I've purchased som 20 plus products from them and never been disappointed. Simply amazing!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Slider End -->

    <!-- Custom Call to Action Section -->
    <div class="section-block pt-40 pb-10 bkg-ash">
        <div class="row flex one-column-on-tablet">
            <div class="column width-7 left center-on-mobile horizon" data-animate-in="preset:slideInLeftShort;duration:1000ms;delay:0;" data-threshold="1">
                <p class="lead mb-30 color-white">Don't miss out on great holiday deals from Virtual Pharmacy. Sign up today and always get the very latest by email.</p>
            </div>
            <div class="column width-5 v-align-middle horizon right center-on-mobile " data-animate-in="preset:slideInRightShort;duration:1000ms;delay:300;" data-threshold="1">
                <div class="signup-form-container full-width">
                    <form class="signup-form merged-form-elements" action="php/subscribe.php" method="post" novalidate>
                        <div class="row two-columns-on-tablet">
                            <div class="column width-8">
                                <div class="field-wrapper">
                                    <input type="email" name="email" class="form-email form-element rounded large left" placeholder="Email address*" tabindex="2" required>
                                </div>
                            </div>
                            <div class="column width-4">
                                <input type="submit" value="Subscribe" class="form-submit button full-width rounded large bkg-theme-subscribe bkg-hover-theme color-white color-hover-white">
                            </div>
                        </div>
                        <input type="text" name="honeypot" class="form-honeypot form-element rounded">
                    </form>
                    <div class="form-response show color-white"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Custom Call to Action Section End -->


</div>
<!-- Content End -->


@endsection