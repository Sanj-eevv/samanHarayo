<head>
@include('_partials._common._headMeta')

    @include('_partials._common._stylesheet')
    <!-- Bootstrap Css -->
    <link href="{{asset("assets/dashboard/css/bootstrap.min.css")}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset("assets/dashboard/css/icons.min.css")}}" rel="stylesheet" type="text/css" />
{{--    <link href="{{asset("assets/dashboard/css/materialdesignicons.min.css")}}" rel="stylesheet" type="text/css" />--}}
    <!-- App Css-->
    <link href="{{asset("assets/dashboard/css/app.min.css")}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/dashboard/css/style.css")}}" rel="stylesheet" type="text/css" />

    @yield('page_level_style')

</head>
