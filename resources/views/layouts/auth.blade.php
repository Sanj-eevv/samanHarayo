<!DOCTYPE html>
<html class="no-js" lang="en">

@include('_partials._front._head')

<body>
<div class="main-wrapper">
    @yield('content')
</div>
@include('_partials._front._foot')
@yield('page_level_script')
</body>
</html>
