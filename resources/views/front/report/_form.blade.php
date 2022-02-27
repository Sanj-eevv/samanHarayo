@csrf
<div class="report-form-container">
    <div class="report-form-product-details">
        <div class="row mb-20">
            <div class="col-lg-6 form-group">
                <label class="form-label">Item name</label>
                <div class="sh-input-div">
                    <span class="sh-input-div-icon"><i class="fas fa-people-carry"></i></span>
                    <input class="form-control @error('name') is-invalid @enderror sh-input" type="text" name="name" value="{{old('name')}}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 form-group form-group">
                <label class="form-label">Brand</label>
                <div class="sh-input-div">
                    <span class="sh-input-div-icon"><i class="fas fa-building"></i></span>
                    <input class="form-control @error('brand') is-invalid @enderror sh-input" type="text" name="brand" value="{{old('brand')}}">
                    @error('brand')
                    <span class="invalid-feedback" role="alert">
                        {{$message}}
                    </span>
                    @enderror
                </div>

            </div>
        </div>
        <div class="row mb-20">
            <div class="col-lg-6 form-group">
                <label class="form-label">Contact Email</label>
                <div class="sh-input-div">
                    <span class="sh-input-div-icon"><i class="fas fa-envelope"></i></span>
                    <input class="form-control @error('email') is-invalid @enderror  sh-input" type="text" name="email" value="{{old('email',auth()->user()->email)}}" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <label class="form-label">Contact Phone</label>
                <div class="sh-input-div">
                    <span class="sh-input-div-icon"><i class="fas fa-phone"></i></span>
                    <input class="numeric form-control @error('phone') is-invalid @enderror sh-input" type="text" name="phone" value="{{old('phone')}}" required>
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-20">
            <div class="col-lg-12 form-group">
                <label class="form-label">Category</label>
                <div class="sh-input-div">
                    <span class="sh-input-div-icon"><i class="fas fa-braille"></i></span>
                    <select class="@error('category') is-invalid @enderror  sh-input" name="category" required>
                        <option>Select a category</option>
                        @foreach ($categories as $category)
                            <?php
                            if(old('category') == $category->id){
                                $selected = 'selected';
                            }else{
                                $selected = '';
                            }
                            ?>
                            <option value="{{ $category->id }}" {{ $selected }}>{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <span class="invalid-feedback" role="alert">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-20">
            <div class="col-lg-12 form-group">
                <label class="form-label">Images</label>
                <div class="input-images @error('product_photo') is-invalid @enderror"></div>
                @error('product_photo')
                <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-20 form-group">
                <label>Product Description</label>
                <textarea class="form-control @error('description')is-invalid @enderror" placeholder="Give more details about your product" name="description" required>{{old('description')}}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
                @enderror
            </div>
        </div>
        @include('front.report._google-map')
        @if($show)
        <div class="row">
            <div class="col-lg-12">
                <div class="row mb-20">
                    <div class="col-lg-12">
                        <div class="form-check mb-10">
                            <input type="checkbox" id="featureCheckBox" name="featureCheckBox" value="true" {{old('featureCheckBox') ? 'checked' : ''}}>
                            <label for="featureCheckBox">Feature this Report?</label>
                            <small class="form-text text-muted">Featuring report costs $12/day</small>
                        </div>
                        <div class="sh-input-div featureReportInput">
                            <span class="sh-input-div-icon"><i class="fas fa-funnel-dollar"></i></span>
                            <input class="form-control @error('feature_report_duration') is-invalid @enderror sh-input" type="text" placeholder="No of days" name="feature_report_duration" value="{{old('feature_report_duration')}}">
                            @error('feature_report_duration')
                            <span class="invalid-feedback" role="alert">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-20 feature-image-box">
                    <div class="col-lg-12 from-group">
                        <label class="form-label">Featured Image</label>
                        <div class="sh-input-div sh-image-input-div">
                            <input class=" @error('featured_image') is-invalid @enderror sh-input" type="file"  name="featured_image" id="image"
                                   onchange="loadPreview(this)">
                            @error('featured_image')
                            <span class="invalid-feedback" role="alert">
                                {{$message}}
                            </span>
                            @enderror
                            <div class="sh_preview_image_container d-none">
                                <img id="sh_preview_img" src=""
                                     class="img-fluid " />
                                <a href="!#" class="sh_preview_image_close"><i class="fas fa-times"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            <div class="form-check mb-10">
                <input type="checkbox" id="rewardCheckBox" name="rewardCheckBox" value="true" {{old('rewardCheckBox')? 'checked' : ''}}>
                <label for="rewardCheckBox">Reward</label>
            </div>
            <div class="sh-input-div rewardInput">
                <span class="sh-input-div-icon"><i class="fas fa-dollar-sign"></i></span>
                <input class="form-control @error('reward_amount') is-invalid @enderror  sh-input" type="text" placeholder="Reward Amount in USD" name="reward_amount" value="{{old('reward_amount')}}">
                @error('reward_amount')
                <span class="invalid-feedback" role="alert">
                        {{$message}}
                    </span>
                @enderror
            </div>
        </div>
        </div>
        @endif
        <div class="Place-order">
            <button type="submit">{{$buttonText}}</button>
        </div>
    </div>
</div>
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

        //on enter keypress serarch address
        var input = document.getElementById('search_address');
        input.addEventListener("keydown", function (e) {
            if (e.code === "Enter") {
                codeAddress();
            }
        });

        $(document).ready(function() {
            // Toggle reward and feature check box for the first time
            var rewardCheckBox = $("#rewardCheckBox");
            var featureCheckBox = $("#featureCheckBox");
            if (rewardCheckBox.is(":checked")) {
                $('.rewardInput').show();
            }
            if (featureCheckBox.is(":checked")) {
                $('.featureReportInput').show();
                $('.feature-image-box').show();
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
@endsection
