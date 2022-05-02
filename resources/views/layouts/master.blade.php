<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0" name="viewport">

    <!-- Open Graph -->
    <meta property="og:title" content="Your Page Title Here" />
    <meta property="og:url" content="http://dev.thememountain.com/faulkner/project-style-one.html" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://dev.thememountain.com/faulkner/images/portfolio/projects/project-1-1.jpg" />
    <meta property="og:description" content="Your Page Description Here" />

    <!-- Twitter Theme -->
    <meta name="twitter:widgets:theme" content="light">
    
    <!-- Title &amp; Favicon -->    
    <title>Virtual Pharmacy - online store for medicated goods</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/theme-mountain-favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700%7CHind+Madurai:400,500&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/core.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/skin.css') }}" />

    <!--[if lt IE 9]>
        <script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body class="shop home-page">

    <!-- Side Navigation Menu -->
    <aside class="side-navigation-wrapper enter-right" data-no-scrollbar data-animation="push-in">
        <div class="side-navigation-scroll-pane">
            <div class="side-navigation-inner">
                <div class="side-navigation-header">
                    <div class="navigation-hide side-nav-hide">
                        <a href="#">
                            <span class="icon-cancel medium"></span>
                        </a>
                    </div>
                </div>
                <nav class="side-navigation nav-block">
                    <ul>
                        <li class="current">
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#" class="contains-sub-menu">Medicines</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">All Medicines</a>
                                </li>
                                <li>
                                    <a href="#">Blood Pressure</a>
                                </li>
                                <li>
                                    <a href="#">Diabetes</a>
                                </li>
                                <li>
                                    <a href="#">Cancer</a>
                                </li>
                                <li>
                                    <a href="#">Fever</a>
                                </li>
                                <li>
                                    <a href="#">Digestive Disorder</a>
                                </li>
                                <li class="#">
                                    <a href="#">Cardiac Arrest</a>
                                </li>
                                <li>
                                    <a href="#">Mental issues</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="contains-sub-menu">Health Care</a>
                        </li>
                        <li>
                            <a href="#" class="contains-sub-menu">Men's Care</a>
                        </li>
                        <li>
                            <a href="#" class="contains-sub-menu">Women's Care</a>
                        </li>
                        <li>
                            <a href="#" class="contains-sub-menu">Baby Care</a>
                        </li>
                        <li>
                            <a href="#" class="contains-sub-menu">Dental Care</a>
                        </li>
                        <li>
                            <a href="#" class="contains-sub-menu">Dental Care</a>
                        </li>
                        <li>
                            <a href="#" class="contains-sub-menu">Gym & Fitness</a>
                        </li>
                        <li>
                            <a href="#" class="contains-sub-menu">Surgical Accessories</a>
                        </li>
                        <li>
                            <a href="#" class="contains-sub-menu">Nutritions & Vitamins</a>
                        </li>
                    </ul>
                </nav>
                <div class="side-navigation-footer">
                    <p class="copyright no-margin-bottom">&copy; 2017 ThemeMountain.</p>
                </div>
            </div>
        </div>
    </aside>
    <!-- Side Navigation Menu End -->

    <div class="wrapper reveal-side-navigation">
        <div class="wrapper-inner">

            @if(Request::path() == 'staff/login' || Request::path() == 'staff/register')
                <div></div>
            @else
                <!-- Header -->
            <header class="header header-fixed header-fixed-on-mobile {{Request::path() == '/' ? 'header-transparent' : ''}}" data-sticky-threshold="100" data-bkg-threshold="100">
                <div class="header-inner">
                    <div class="row nav-bar">
                        <div class="column width-12 nav-bar-inner">
                            <div class="logo">
                                <div class="logo-inner">
                                    <a href="{{ url('/') }}">Virtual Pharmacy</a>
                                    <a href="{{ url('/') }}">Virtual Pharmacy</a>
                                </div>
                            </div>
                            <nav class="navigation nav-block secondary-navigation nav-right">
                                <ul>
                                    @if(Request::path() == 'login' || Request::path() == 'register')  
                                        <li></li>       
                                        <li></li>
                                    @else
                                    <li>
                                        <!-- Dropdown Cart Overview -->
                                        @if(Request::path() == 'user/cart')
                                        <div></div>
                                        @else
                                        <div class="dropdown">
                                            <a href="#" class="nav-icon cart button no-page-fade"><span class="cart-indication"><span class="icon-shopping-bag"></span> <span class="badge"></span></span></a>
                                            <ul class="dropdown-list custom-content cart-overview">
                                                @if(count($cart_products) > 0)
                                                @foreach($cart_products as $cart)
                                                <li class="cart-item">
                                                    <a href="{{ route('product.single', $cart->product->id) }}" class="product-thumbnail">
                                                            <img src="{{$cart->product->photo->file}}" alt="" />
                                                    </a>
                                                    <div class="product-details">
                                                        <a href="{{ route('product.single', $cart->product->id) }}" class="product-title">
                                                           {{$cart->product->name}}
                                                        </a>
                                                        <span class="product-quantity">{{$cart->quantity}} x</span>
                                                        <span class="product-price"><span class="currency">PKR</span>{{$cart->product->price}}</span>
                                                        <form id="form{{$cart->id}}" action="{{ route('product.cart.remove', $cart->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="#"  onclick="addFunction({{$cart->id}});" class="product-remove">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </form>
                                                    </div>
                                                </li>
                                                @endforeach
                                                <li class="cart-subtotal">
                                                    Sub Total
                                                    <span class="amount"><span class="currency">PKR</span> {{$cart_price}}.00</span>
                                                </li>
                                                <li class="cart-actions">
                                                    <a href="{{ route('user.cart') }}" class="view-cart mt-10">View Cart</a>
                                                    <a href="{{ route('user.checkout') }}" class="checkout button small rounded">Checkout Now</a>
                                                </li>
                                                @else
                                                    <li>
                                                        <div class="row v-align-middle">
                                                            <div class="column width-12">
                                                                <img class="" src="/assets/images/shop/grid/large-margins/empty-cart.svg" alt=  "">
                                                                <h3 class="center mt-10">Cart is empty</h3>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                        @endif
                                    </li>
                                    <li>
                                        <!-- Button -->
                                        <div class="v-align-middle">
                                            @if(Route::has('login'))
                                                @auth
                                                <!-- Dropdown Login -->
                                                <div class="v-align-middle">
                                                    <div class="dropdown">
                                                        <a href="#" class="nav-icon flex no-page-fade no-label-on-mobile no-margin-bottom no-padding-right">
                                                            <img width="30" height="30" class="avatar circle pull-left no-margin-bottom hide-on-mobile" src="/assets/images/assets/avatar.jpg" alt=""><span>{{Auth::user()->firstname}}</span><span class="icon-down"></span></a>
                                                        <div class="dropdown-list custom-content">
                                                            <a href="{{ route('home') }}" type="submit" class="form-submit button small rounded bkg-green bkg-hover-green color-white color-hover-white" tabindex="3">Account</a>
                                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" type="submit" class="form-submit button small rounded bkg-green bkg-hover-green color-white color-hover-white ml-50" tabindex="3"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>      
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                <a href="{{route('login')}}" data-content="inline" data-au  x-classes="tml-form-modal height-auto" data-toolbar="" data-modal-mode data-modal-width="500" data-modal-animation="scaleIn" data-lightbox-animation="fadeIn"  class="button small rounded no-label-on-mobile no-margin-bottom fade-location">Sign In</a>
                                                @endauth
                                            @endif
                                        </div>
                                    <li>
                                    @endif
                                    <li class="aux-navigation hide">
                                        <!-- Aux Navigation -->
                                        <a href="#" class="navigation-show side-nav-show nav-icon">
                                            <span class="icon-menu"></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <nav class="navigation nav-block primary-navigation nav-right sub-menu-indicator">
                                <ul>
                                    <li>
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    @foreach($main_menu as $category)
                                    <li class="contains-sub-menu">
                                        <a href="{{ route('category.product.show', $category->id) }}">{{$category->name}}</a>
                                        <ul class="sub-menu">
                                            @foreach($category->subcategory as $subcate)
                                            <li>
                                                <a href="{{ route('subcategory.product.show', $subcate->id) }}">{{$subcate->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                    <li class="contains-sub-menu sub-menu-right">
                                        <a href="#">More</a>
                                        <ul class="sub-menu">
                                            @foreach($full_menu as $category)
                                            <li class="contains-sub-menu sub-menu-right">
                                                <a href="{{ route('category.product.show', $category->id) }}">{{$category->name}}</a>
                                                <ul class="sub-menu">
                                                    @foreach($category->subcategory as $subcate)
                                                    <li>
                                                        <a href="{{ route('subcategory.product.show', $subcate->id) }}">{{$subcate->name}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Header End -->
            @endif

            @yield('content')

            <!-- Footer -->
            @if(Request::path() == 'staff/login' || Request::path() == 'staff/register')
                <div></div>
            @else
            <footer class="footer footer-light with-border">
            <div class="footer-top">
                <div class="row">
                    <div class="column width-6 push-6">
                        <div class="widget right center-on-mobile">
                            <div class="footer-logo">
                                <a href="{{ url('/') }}">Virtual Pharmacy</a>
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
            @endif
<!-- Footer End -->

            </div>
        </div>

    <!-- Js -->
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/timber.master.min.js') }}"></script>
    <script> 
function addFunction(id) {
document.getElementById('form'+id).submit();   
}
    </script>
    @include('sweetalert::alert')
    @yield('scripts')
</body>
</html>