<!DOCTYPE html>
<html class="no-js" lang="en">

@include('_partials._dashboard._head')

<body data-sidebar="dark">
    <div id="layout-wrapper">
        @include('_partials._dashboard._header')
        @include('_partials._dashboard._sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @include('_partials._dashboard._breadcrumb')
                    @yield('content')
                </div>
            </div>
            @include('_partials._dashboard._footer')
        </div>
    </div>
    @include('_partials._dashboard._foot')
    @yield('page_level_script')
    @include('utils._toastify')
    @include('utils._alertify')
</body>
</html>
