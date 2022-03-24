@extends('layouts.front')
@section('content')
    <?php
    $stripePubKey = config('app.settings.stripe_publishable_key');
    $currencyTextRaw = 'USD';
    $per_report_price = config('app.settings.per_report_price');
    $total = floatval($per_report_price);
    $report = $report->slug;
    ?>
{{--    @include('utils._error_all')--}}
    <div class="checkout-main-area pt-25 pb-50">
        <div class="container">
            <div class="row">
                <div class="d-flex pb-3">
                    <h3 class="sh-title">Identity Details</h3>
                </div>
                @if(session("failureMsg"))
                    <div class="alert alert-danger fade show mt-1" id="paymentErrorAlert" role="alert">
                        <span>{{ session("failureMsg") }}</span>
                    </div>
                @endif
                <div class="alert alert-danger fade show mt-1" id="validationErrorAlert" role="alert" style="display:none;">
                    <span id="validationErrorText"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="identity-form-container">
                            <div class="report-form-product-details">
                                <div class="row mb-20">
                                    <div class="col-md-12 from-group">
                                        <label class="form-label">Identity (Front)</label>
                                        <small class="form-text text-muted">(Citizenship card, license card)</small>
                                        <div class="sh-input-div sh-image-input-div">
                                            <input class="@error('identity_front') is-invalid @enderror sh-input" type="file"  name="identity_front" id="identity_front_input"
                                                   onchange="loadPreview(this, '#identity_front')" required>
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
                                               onchange="loadPreview(this, '#identity_back')" required>
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
                                <div class="row mb-20">
                                    <div class="col-lg-12 from-group">
                                        <label class="form-label">Current Image</label>
                                        <small class="form-text text-muted">(Image of a user without using filter)</small>
                                        <div class="sh-input-div sh-image-input-div">
                                            <input class=" @error('current_image') is-invalid @enderror sh-input" type="file"  name="current_image" id="current_image_input"
                                                   onchange="loadPreview(this, '#current_image')" required>
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
{{--                                <div class="row mb-20">--}}
{{--                                    <div class="col-lg-12 form-group">--}}
{{--                                        <label class="form-label">Your images with the product (Optional)</label>--}}
{{--                                        <div class="input-images @error('item_image') is-invalid @enderror"></div>--}}
{{--                                        @error('item_image')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                            {{$message}}--}}
{{--                                         </span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-12 mb-20 form-group">--}}
{{--                                        <label>Product Description</label>--}}
{{--                                        <textarea class="form-control @error('description')is-invalid @enderror" placeholder="Give more details about your product" name="description" id="description" required>{{old('description')}}</textarea>--}}
{{--                                        @error('description')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                        {{$message}}--}}
{{--                                        </span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    <div class="report-form-payment-container">
                        <div class="payment-method-container">
                            <div class="payment-method-title">
                                <h3>Select a Payment Method</h3>
                            </div>
                            <div class="payment-method">
                                <div class="payment-select-div">
                                    <input id="payment_method_stripe" class="input-radio" type="radio" checked="checked" name="payment_method">
                                    <label for="payment_method_stripe">Stripe</label>
                                </div>

                                <div class="payment-box">
                                    <p>Pay securely with your credit card via Stripe.</p>
                                    <div class="col-lg-8 mt-20">
                                        <div id="stripe-card-element" class="card-input">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mt-20">
                                        <div class="checkout-terms form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                   id="terms_checkbox">
                                            <label class="form-check-label" for="terms_checkbox">
                                                I agree to {{config('app.name')}}<a href="#" class="text-muted"> terms and conditions.</a>
                                                <a class="text-muted" href="#">Privacy Policy information.</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <form id="payment-form-stripe" name="stripePayForm" method="POST">
                                            <div class="place-order-flex-box">
                                                <div class="checkout-page Place-order">
                                                    <button class="button btn btn-payment btn-dark btn-block"
                                                            id="payStartBtnStripe" form="payment-form-stripe"
                                                            type="submit">Pay
                                                    </button>
                                                </div>
                                                <div class="spinner-border" id="payStartSpinner" role="status"  style="width: 2rem; height: 2rem; display: none">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="payment-select-div">
                                    <input id="payment_method_paypal" class="input-radio" type="radio" name="payment_method">
                                    <label for="payment_method_paypal">Paypal</label>
                                </div>

                                <div class="payment-box">
                                    <p>Pay securely with your credit card via Paypal.</p>
                                    <div class="col-lg-8 mt-20">
                                        <div id="paypal-card-element">
                                            <!-- A Paypal Element will be inserted here. -->
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mt-20">
                                        <div class="checkout-terms form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                   id="paypal_terms_checkbox">
                                            <label class="form-check-label" for="paypal_terms_checkbox">
                                                I agree to {{config('app.name')}}<a href="#" class="text-muted"> terms and conditions.</a>
                                                <a class="text-muted" href="#">Privacy Policy information.</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <form action="{{route('checkout.fulfillOrder')}}"
                                              id="payment-form-paypal" name="paypalPayForm" method="POST">
                                            @csrf
                                            <input type="hidden" id="transaction_paypal"
                                                   name="transaction_id" />
                                            <input type="hidden" id="total_paypal" name="total" />
                                            <div class="place-order-flex-box">
                                                <div class="spinner-border" id="PaypalpayStartSpinner" role="status"  style="width: 2rem; height: 2rem; display: none">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection
@section('page_level_script')
    @include('front.checkout.stripe-script')
    @include('front.checkout.paypal-script')
    @include('front.checkout.checkout-script')
@endsection
