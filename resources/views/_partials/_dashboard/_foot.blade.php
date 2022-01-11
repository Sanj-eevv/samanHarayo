<!-- JAVASCRIPT -->

<script src="{{asset("assets/dashboard/js/libs/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets/dashboard/js/libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/dashboard/js/libs/metismenu/metisMenu.min.js")}}"></script>
<script src="{{asset("assets/dashboard/js/libs/simplebar/simplebar.min.js")}}"></script>
<script src="{{asset("assets/dashboard/js/libs/node-waves/waves.min.js")}}"></script>

<!-- apexcharts -->
<script src="{{asset("assets/dashboard/js/libs/apexcharts/apexcharts.min.js")}}"></script>

<!-- Sweet Alerts js -->
<script src="{{asset("assets/dashboard/libs/sweetalert2/sweetalert2.min.js")}}"></script>

<!-- Sweet alert init js-->
{{--<script src="{{asset("assets/dashboard/js/pages/sweet-alerts.init.js")}}"></script>--}}
<!-- Toast message -->
<script src="{{asset("assets/dashboard/libs/toastr/build/toastr.min.js")}}"></script>

@include('_partials._common._script')

{{--Data tables--}}
<script src="{{asset("assets/dashboard/libs/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/dashboard/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js")}}"></script>

{{--custom js--}}
<script src="{{asset('assets/dashboard/js/dashboard-custom.js')}}"></script>

<!-- dashboard init -->
{{--<script src="{{asset("assets/dashboard/js/pages/dashboard.init.js")}}"></script>--}}

{{--custom js--}}

<!-- App js -->
<script src="{{asset("assets/dashboard/js/app.js")}}"></script>
@yield('page_level_script')
