<!DOCTYPE html>
<html class="no-js" lang="en">

@include('_partials._front._head')

<body>
<div class="main-wrapper">
    @include('_partials._front._header')

    @yield('content')

    @include('_partials._front._footer')
</div>
@include('_partials._front._foot')
@yield('page_level_script')
@include('utils._toastify')
@include('utils._alertify')
</body>
</html>
