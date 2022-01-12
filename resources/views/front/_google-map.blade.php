<div class="row">
    <div class="col-lg-12 mb-20 d-flex">
        <input id="address" name="address" class="form-control mr-10" type="text" value="" placeholder="Enter the place name" />
        <button type="button" class="btn btn-secondary" onclick="codeAddress()">Submit</button>
    </div>
</div>
<div class="map-container">
    <div id="map_canvas"></div>
</div>
<style>
    .map-container{
        height: 400px;
        position: relative;
    }
    #map_canvas {
        height: 100%;
        width: 100%;
    }
</style>
@section('page_level_script')
    <script>
        var geocoder;
        var map;
        var marker;
        var infowindow = new google.maps.InfoWindow({
            size: new google.maps.Size(150, 50)
        });

        function initialize() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(26.66666670, 87.28333330);
            var mapOptions = {
                zoom: 12,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
            google.maps.event.addListener(map, 'click', function() {
                infowindow.close();
            });
        }

        function geocodePosition(pos) {
            geocoder.geocode({
                latLng: pos
            }, function(responses) {
                var address = document.getElementById('address').value;
                if (responses && responses.length > 0) {
                    marker.formatted_address = responses[0].formatted_address;
                } else {

                    // marker.formatted_address = 'Cannot determine address at this location.';
                    marker.formatted_address = address;
                }
                infowindow.setContent(marker.formatted_address);
                console.log('lat ==>', marker.getPosition().lat());
                console.log('long ==>', marker.getPosition().lng());
                infowindow.open(map, marker);
            });
        }

        function codeAddress() {
            var address = document.getElementById('address').value;
            geocoder.geocode({
                'address': address
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    if (marker) {
                        marker.setMap(null);
                        if (infowindow) infowindow.close();
                    }
                    marker = new google.maps.Marker({
                        map: map,
                        draggable: true,
                        position: results[0].geometry.location
                    });
                    google.maps.event.addListener(marker, 'dragend', function() {
                        geocodePosition(marker.getPosition());
                    });
                    google.maps.event.addListener(marker, 'click', function() {
                        console.log('lat ==>', marker.getPosition().lat());
                        console.log('long ==>', marker.getPosition().lng());
                        if (marker.formatted_address) {
                            infowindow.setContent(marker.formatted_address);
                        } else {
                            infowindow.setContent(address);
                        }
                        infowindow.open(map, marker);
                    });
                    google.maps.event.trigger(marker, 'click');
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
        google.maps.event.addDomListener(window, "load", initialize);

        //on enter keypress
        var input = document.getElementById('address');
        input.addEventListener("keydown", function (e) {
            if (e.code === "Enter") {
                codeAddress();
            }
        });
    </script>
@endsection
