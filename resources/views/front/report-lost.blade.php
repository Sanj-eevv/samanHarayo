@extends('layouts.front')
@section('content')
    <div class="checkout-main-area pb-50">
        <div class="container checkout-content">
                <form action="#">
                    <div class="customer-zone mb-20">
                        <p class="cart-page-title mb-10">My Information</p>
                        <div class="checkout-login-info">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="billing-info">
                                            <label class="mb-20">
                                                First Name <abbr class="required" title="First name">*</abbr>
                                                <input class="mt-10" name="first_name" type="text">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="billing-info mb-20">
                                            <label>
                                                Last Name <abbr class="required" title="required">*</abbr>
                                                <input class="mt-10" type="text">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="billing-info mb-20">
                                        <label>Email Address</label>
                                        <input type="text">
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="customer-zone mb-20">
                        <p class="checkout-click3 cart-page-title">What have you lost?
                            <a href="#">
                                <i class="fas fa-caret-down"></i>
                            </a>
                        </p>
                        <div class="checkout-login-info3">
                                <div class="col-lg-12 col-md-12">
                                    <div class="billing-info mb-20">
                                        <label>Item name<abbr class="required" title="required">*</abbr></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Color</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-select mb-20">
                                        <label>Category</label>
                                        <select>
                                            <option>Select a category</option>
                                            <option>Azerbaijan</option>
                                            <option>Bahamas</option>
                                            <option>Bahrain</option>
                                            <option>Bangladesh</option>
                                            <option>Barbados</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="billing-info mb-20">
                                        <label>Brand<abbr class="required" title="required">*</abbr></label>
                                        <input type="text">
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="customer-zone mb-20">
                        <p class="checkout-click2 cart-page-title">Location
                            <a href="#">
                                <i class="fas fa-caret-down"></i>
                            </a>
                        </p>
                        <div class="checkout-login-info2">
                                <div class="col-lg-12">
                                    <div class="billing-select mb-20">
                                        <label>Country</label>
                                        <select>
                                            <option>Select a country</option>
                                            <option>Azerbaijan</option>
                                            <option>Bahamas</option>
                                            <option>Bahrain</option>
                                            <option>Bangladesh</option>
                                            <option>Barbados</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="billing-select mb-20">
                                        <label>State <abbr class="required" title="required">*</abbr></label>
                                        <select>
                                            <option>Select a state</option>
                                            <option>Azerbaijan</option>
                                            <option>Bahamas</option>
                                            <option>Bahrain</option>
                                            <option>Bangladesh</option>
                                            <option>Barbados</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Street Address <abbr class="required" title="required">*</abbr></label>
                                        <input class="billing-address" placeholder="House number and street name" type="text">
                                        <input placeholder="Apartment, suite, unit etc." type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="billing-info mb-20">
                                        <label>Phone <abbr class="required" title="required">*</abbr></label>
                                        <input type="text">
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="additional-info-wrap">
                        <label>Order notes</label>
                        <textarea placeholder="Notes about your order, e.g. special notes for delivery. " name="message"></textarea>
                    </div>
                    @include('front._google-map')
{{--                    <div id="map"></div>--}}
{{--                    <pre id="coordinates" class="coordinates"></pre>--}}
                    <div class="Place-order">
                        <a href="#">Submit Report</a>
                    </div>
                </form>
        </div>
    </div>
@endsection()
@section('page_level_script')
<script>
    // $(document).ready(function() {
    //     mapboxgl.accessToken = 'pk.eyJ1Ijoic2FuamVldjEyNzEyNyIsImEiOiJja3lhemh6dWMwYWxwMm9wbG1tYzB4dWV4In0._EiMclyfYIjZHPvJbnKTrw';
    //     const coordinates = document.getElementById('coordinates');
    //     const map = new mapboxgl.Map({
    //         container: 'map',
    //         style: 'mapbox://styles/mapbox/streets-v11',
    //         center: [85.351251257846, 27.691849893078142],
    //         zoom: 2
    //     });
    //     const marker1 = new mapboxgl.Marker({
    //         draggable: true
    //     }).setLngLat([85.351251257846, 27.691849893078142])
    //         .addTo(map);
    //     map.addControl(new mapboxgl.FullscreenControl());
    //     map.addControl(
    //         new MapboxGeocoder({
    //             marker: {
    //                draggable: true
    //             },
    //             accessToken: mapboxgl.accessToken,
    //             mapboxgl: mapboxgl
    //         })
    //     );
    //     function onDragEnd() {
    //         const lngLat = marker.getLngLat();
    //         coordinates.style.display = 'block';
    //         coordinates.innerHTML = `Longitude: ${lngLat.lng}<br />Latitude: ${lngLat.lat}`;
    //     }
    //
    //     marker.on('dragend', onDragEnd);
    // });
</script>
@endsection
