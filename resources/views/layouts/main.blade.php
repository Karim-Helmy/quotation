<!DOCTYPE html>
<html lang="{{ getLanguagePrefix() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Find easily a doctor and book online an appointment">
    <meta name="author" content="Ansonika">
    <title>Quotation Management System | {{ (isset($pageTitle)) ? $pageTitle : '' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="/assets/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="/assets/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="/assets/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="/assets/img/apple-touch-icon-144x144-precomposed.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- BASE CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet"> {{--
    <link href="/css/bootstrap-rtl.min.css" rel="stylesheet"> --}}
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/menu.css" rel="stylesheet">
    <link href="/assets/css/vendors.css" rel="stylesheet">
    <link href="/assets/css/icon_fonts/css/all_icons_min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link href="/assets/css/custom.css" rel="stylesheet">
    <script src="/assets/js/modernizr.js"></script>
</head>
<body>
    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div>
    <!-- End Preload -->
    @include('includes.header')
    <main>
        @yield('content')
    </main>
    <div id="toTop"></div>
    <!-- COMMON SCRIPTS -->
    <script src="/assets/js/jquery-2.2.4.min.js"></script>
    <script src="/assets/js/common_scripts.min.js"></script>
    {{--
    <script src="/js/bootstrap.min.js"></script> --}} {{--
    <script src="/js/bootstrap.bundle.min.js"></script> --}}
    <script src="/assets/js/functions.js"></script>
    <!-- SPECIFIC SCRIPTS -->
    <script src="/assets/js/video_header.js"></script>
    <script src="/assets/js/custom.js"></script>
    <script>
        'use strict';
		HeaderVideo.init({
			container: $('.header-video'),
			header: $('.header-video--media'),
			videoTrigger: $("#video-trigger"),
			autoPlayVideo: true
		});
    </script>
    @yield('customJs')
    {{-- VUE COMPONENTS --}}
    <script src="/assets/js/app.js" defer></script>
</body>
</html>
