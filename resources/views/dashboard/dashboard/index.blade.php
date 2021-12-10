@extends('layouts.dashboard')
@section('content')

<!-- Begin page -->
        @include('_partials._dashboard._header')
    <!-- ========== Left Sidebar Start ========== -->
        @include('_partials._dashboard._sidebar')
    <!-- ========== Left Sidebar End ========== -->

    <!-- ============================================================== -->
    <!-- Content Begins -->
    <!-- ============================================================== -->
        <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                @include('_partials._dashboard._breadcrumb')
                <!-- end page title -->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

            @include('_partials._dashboard._footer')
    </div>
    <!-- ============================================================== -->
    <!-- Content end -->
    <!-- ============================================================== -->

<!-- End page -->

@endsection
