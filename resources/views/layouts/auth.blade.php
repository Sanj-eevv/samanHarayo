<!DOCTYPE html>
<html class="no-js" lang="en">

@include('_partials._dashboard._head')

<body>
<div class="account-pages my-5 pt-sm-5">
    @yield('content')
</div>
@include('_partials._dashboard._foot')
@yield('page_level_script')
@yield('page_level_script')
@include('utils._toastify')
@include('utils._alertify')
</body>
</html>
