<head>
@include('_partials._common._headMeta')

    <!-- Bootstrap Css -->
    <link href="{{asset("assets/dashboard/css/vendor/bootstrap.min.css")}}" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{asset("assets/dashboard/css/plugins/datatables.net-bs4/dataTables.bootstrap4.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/dashboard/css/plugins/datatables.net-buttons-bs4/buttons.bootstrap4.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/dashboard/css/plugins/datatables.net-responsive-bs4/responsive.bootstrap4.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset("assets/dashboard/css/plugins/icons.min.css")}}" rel="stylesheet" type="text/css" />

    @include('_partials._common._stylesheet')

    <!-- App Css-->
    <link href="{{asset("assets/dashboard/css/app.min.css")}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/dashboard/css/style.css")}}" rel="stylesheet" type="text/css" />

    @yield('page_level_style')

</head>
