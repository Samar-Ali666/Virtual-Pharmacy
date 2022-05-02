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

    @yield('partial')

<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/timber.master.min.js') }}"></script>
</body>
</html>