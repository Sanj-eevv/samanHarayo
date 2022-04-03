@extends('layouts.front')
@section('content')
    <div class="checkout-main-area pt-25 pb-50">
        <div class="container">
            <div class="row">
                <div class="d-flex pb-3">
                    <h3 class="sh-title">Identity Details</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="identity-form-container">
                            <div class="report-form-product-details">
                                <form action="{{route('identity.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{$report->slug}}" name="report" >
                                    @if(!$verified)
                                    <div class="row mb-20">
                                        <div class="col-md-12 from-group">
                                            <label class="form-label">Identity (Front)</label>
                                            <small class="form-text text-muted">(Citizenship card, license card)</small>
                                            <div class="sh-input-div sh-image-input-div">
                                                <input class="@error('identity_front') is-invalid @enderror sh-input" type="file"  name="identity_front" id="identity_front_input"
                                                       onchange="loadPreview(this, '#identity_front')">
                                                @error('identity_front')
                                                <span class="invalid-feedback" role="alert">
                                                {{$message}}
                                            </span>
                                                @enderror
                                                <div class="sh_preview_image_container d-none">
                                                    <img id="identity_front" src=""
                                                         class="img-fluid "  alt=""/>
                                                    <a href="!#" class="sh_preview_image_close"><i class="fas fa-times"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-20">
                                        <div class="col-md-12 from-group">
                                            <label class="form-label">Identity (Back)</label>
                                            <small class="form-text text-muted">(Citizenship card, license card)</small>
                                            <div class="sh-input-div sh-image-input-div">
                                                <input class="@error('identity_back') is-invalid @enderror sh-input" type="file"  name="identity_back" id="identity_back_input"
                                                       onchange="loadPreview(this, '#identity_back')">
                                                @error('identity_front')
                                                <span class="invalid-feedback" role="alert">
                                                {{$message}}
                                            </span>
                                                @enderror
                                                <div class="sh_preview_image_container d-none">
                                                    <img id="identity_back" src="" class="img-fluid "  alt=""/>
                                                    <a href="!#" class="sh_preview_image_close"><i class="fas fa-times"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if($need_current_image)
                                    <div class="row mb-20">
                                        <div class="col-lg-12 from-group">
                                            <label class="form-label">Current Image</label>
                                            <small class="form-text text-muted">(Image of a user without using filter)</small>
                                            <div class="sh-input-div sh-image-input-div">
                                                <input class=" @error('current_image') is-invalid @enderror sh-input" type="file"  name="current_image" id="current_image_input"
                                                       onchange="loadPreview(this, '#current_image')">
                                                @error('current_image')
                                                <span class="invalid-feedback" role="alert">
                                                {{$message}}
                                            </span>
                                                @enderror
                                                <div class="sh_preview_image_container d-none">
                                                    <img id="current_image" src=""
                                                         class="img-fluid " />
                                                    <a href="!#" class="sh_preview_image_close"><i class="fas fa-times"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="row mb-20">
                                        <div class="col-lg-12 form-group">
                                            <label class="form-label">Item images (If any)</label>
                                            <div class="input-images @error('item_image') is-invalid @enderror"></div>
                                            @error('item_image')
                                            <span class="invalid-feedback" role="alert">
                                            {{$message}}
                                         </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-20">
                                        <div class="col-lg-12 form-group">
                                            <label>Product Description</label>
                                            <textarea class="form-control @error('description')is-invalid @enderror" placeholder="Give more details about your product" name="description" id="description" required>{{old('description')}}</textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                        {{$message}}
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="Place-order">
                                        <button type="submit">Claim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endSection
