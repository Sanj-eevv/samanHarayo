<!-- JAVASCRIPT -->
@include('_partials._common._script')
<script src="{{asset("assets/dashboard/js/libs/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets/dashboard/js/libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/dashboard/js/libs/metismenu/metisMenu.min.js")}}"></script>
<script src="{{asset("assets/dashboard/js/libs/simplebar/simplebar.min.js")}}"></script>
<script src="{{asset("assets/dashboard/js/libs/node-waves/waves.min.js")}}"></script>

<!-- apexcharts -->
<script src="{{asset("assets/dashboard/js/libs/apexcharts/apexcharts.min.js")}}"></script>

<!-- dashboard init -->
<script src="{{asset("assets/dashboard/js/pages/dashboard.init.js")}}"></script>

{{--custom js--}}
@yield('page_level_script')
<!-- App js -->
<script src="{{asset("assets/dashboard/js/app.js")}}"></script>
