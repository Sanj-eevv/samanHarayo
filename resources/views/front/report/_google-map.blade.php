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
