<head>
@include('_partials._common._headMeta')
    <!-- All CSS is here
	============================================ -->
    @include('_partials._common._stylesheet')
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/signericafat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/cerebrisans.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/elegant.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/linear-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/easyzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery-ui.css') }}">
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css" type="text/css">

{{-- custom --}}

    <link rel="stylesheet" href="{{ asset("assets/front/js/plugins/Visual-Password-Strength-Indicator-Plugin-For-jQuery-Passtrength-js/src/passtrength.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/front/js/plugins/aos-master/dist/aos.css") }}" />
    <link src="{{ asset("assets/front/js/plugins/fontawesome-free-5.15.4-web/css/all.css") }}" />

    <link rel="stylesheet" href="{{ asset("assets/front/css/style.css") }}">
    @yield('page_level_style')

</head>
