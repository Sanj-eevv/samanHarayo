<!-- Library -->
<script src="{{ asset("assets/front/js/vendor/bootstrap.min.js") }}"></script>
<script src="{{ asset("assets/front/js/vendor/jquery-v3.6.0.min.js") }}"></script>

<!-- Plugins -->
<script src="{{ asset("assets/front/js/plugins/slick.js") }}"></script>
<script src="{{ asset("assets/front/js/plugins/all.js") }}"></script>
<script src="{{asset("assets/front/js/plugins/image-uploader.min.js")}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{config('services.google_map.api_key')}}"></script>

<!-- Common -->
@include('_partials._common._script')

<!-- Dashboard -->
<script src="{{ asset("assets/front/js/main.js") }}"></script>





