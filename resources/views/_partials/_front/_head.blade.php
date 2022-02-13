<head>
@include('_partials._common._headMeta')
    <!-- All CSS is here -->

    <!-- Library -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/vendor/bootstrap.min.css') }}">

    <!-- plugins -->
    <link rel="stylesheet" href="{{ asset("assets/front/css/plugins/all.min.css") }}" />
    <link rel="stylesheet" href="{{ asset('assets/front/css/plugins/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/plugins/signericafat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset("assets/front/css/plugins/image-uploader.min.css")}}"/>

    <!-- Common -->
    @include('_partials._common._stylesheet')

    <!--Front -->
    <link rel="stylesheet" href="{{ asset("assets/front/css/style.css") }}">

    <!-- Page Level -->
    @yield('page_level_style')
</head>
