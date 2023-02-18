<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ba Nhu Shop</title>
    <!-- Fontfaces CSS-->
    <link href="{{ asset('assets/client/plugins/themefisher-font/style.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/client/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/client/plugins/animate/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/client/plugins/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/client/plugins/slick/slick-theme.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/client/css/style.css') }}" rel="stylesheet" media="all">
    @yield('style')
</head>

<body id=body>
    @include('client.layouts.header')
    @include('client.layouts.menu')
    @yield('content')
    @include('client.layouts.footer')

    <!-- Main jQuery -->
    <script src="{{ asset('assets/client/plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{ asset('assets/client/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap Touchpin -->
    <script src="{{ asset('assets/client/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>

    <!-- slick Carousel -->
    <script src="{{ asset('assets/client/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/client/plugins/slick/slick-animation.min.js') }}"></script>
    <!-- Main Js File -->
    <script src="{{ asset('assets/client/js/script.js') }}"></script>
    <script src="{{ asset('assets/index.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('script' )
</body>
