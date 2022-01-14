<head>
@include('_partials._common._headMeta')

    <!-- Bootstrap Css -->
    <link href="{{asset("assets/dashboard/css/bootstrap.min.css")}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    @include('_partials._common._stylesheet')
<!-- DataTables -->
    <link href="{{asset("assets/dashboard/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/dashboard/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset("assets/dashboard/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="{{asset("assets/dashboard/css/icons.min.css")}}" rel="stylesheet" type="text/css" />
{{--    <link href="{{asset("assets/dashboard/css/materialdesignicons.min.css")}}" rel="stylesheet" type="text/css" />--}}
    <!-- App Css-->
    <link href="{{asset("assets/dashboard/css/app.min.css")}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/dashboard/css/style.css")}}" rel="stylesheet" type="text/css" />

    @yield('page_level_style')

</head>
