<div class="row">
    <div class="flex-google-div col-lg-12 mb-20">
        <div class="input-div">
            <span class="input-div-icon"><i class="fas fa-braille"></i></span>
            <input id="search_address" name="search_address" class="form-control mr-10" type="text" value="{{old('search_address')}}" placeholder="Enter the place name" />
        </div>
        <button type="button" class="btn btn-secondary" onclick="codeAddress()">Submit</button>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 mb-20">
        <input id="_address" name="address" value="{{old('address')}}" class="form-control @error('address') is-invalid @enderror" type="text" placeholder="Drag the marker below to your location or search for the location" readonly/>
        <input id="latitude" name="latitude" type="hidden" value="{{old('latitude')}}" readonly/>
        <input id="longitude" name="longitude" value="{{old('longitude')}}" type="hidden" readonly/>
            @error('address')
            <span class="invalid-feedback"  role="alert">
                {{$message}}
            </span>
            @enderror
    </div>
</div>
<div class="map-container mb-20">
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
                var address = document.getElementById('_address').value;
                if (responses && responses.length > 0) {
                    marker.formatted_address = responses[0].formatted_address;
                    returned_location = getAddress(responses[0].address_components);
                } else {
                    // marker.formatted_address = 'Cannot determine address at this location.';
                    marker.formatted_address = address;
                    returned_location = address;
                }
                document.getElementById('latitude').value =  marker.getPosition().lat();
                document.getElementById('longitude').value =  marker.getPosition().lng();
                document.getElementById('_address').setAttribute('value',returned_location.replace(/,/g, ', '));
                infowindow.setContent(marker.formatted_address);
                infowindow.open(map, marker);
            });
        }

        function getAddress(address_component){
            let address = '';
            for (var i = 0; i < address_component.length; i++) {
                address += address_component[i].long_name;
                if(i != address_component.length-1){
                    address += ','
                }
            }
            return address;
        }

        function codeAddress() {
            var search_address = document.getElementById('search_address').value;
            geocoder.geocode({
                'address': search_address
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    let result = results[0]
                    let address_component = result.address_components;
                    map.setCenter(result.geometry.location);
                    let address = getAddress(address_component);
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
                        // console.log('lat ==>', marker.getPosition().lat());
                        // console.log('long ==>', marker.getPosition().lng());
                        if (marker.formatted_address) {
                            infowindow.setContent(marker.formatted_address);
                        } else {
                            infowindow.setContent(search_address);
                        }
                        infowindow.open(map, marker);
                    });
                    google.maps.event.trigger(marker, 'click');
                    let latitude =  marker.getPosition().lat();
                    let longitude = marker.getPosition().lng();
                    document.getElementById('latitude').value = latitude;
                    document.getElementById('longitude').value = longitude;
                    document.getElementById('_address').setAttribute('value',address.replace(/,/g, ', '));

                } else {
                    toastError('Geocode was not successful for the following reason: ' + status);
                }

            });
        }
        google.maps.event.addDomListener(window, "load", initialize);

        //on enter keypress
        var input = document.getElementById('search_address');
        input.addEventListener("keydown", function (e) {
            if (e.code === "Enter") {
                codeAddress();
            }
        });

        $(document).ready(function() {
            //reward check box
            if ($("#rewardCheckBox").is(":checked")) {
                $('.rewardInput').show();
            }
            if ($("#featureCheckBox").is(":checked")) {
                $('.featureReportInput').show();
            }

            // disabling enter key for submitting form
            $('form input').keydown(function (e) {
                if (e.keyCode == 13) {  // 13 = enter key
                    e.preventDefault();
                    return false;
                }
            });
        } );
    </script>
    </script>
@endsection
