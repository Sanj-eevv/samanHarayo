<!DOCTYPE html>
<html class="no-js" lang="en">

@include('_partials._dashboard._head')

<body data-sidebar="dark">
    <div id="layout-wrapper">
        @include('_partials._dashboard._header')

        @yield('content')

        @include('_partials._dashboard._footer')
    </div>
    @include('_partials._dashboard._foot')
    @yield('page_level_script')
</body>
</html>
