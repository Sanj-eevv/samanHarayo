@extends('layouts.front')
@section('content')
    <?php
    $stripePubKey = config('app.settings.stripe_publishable_key');
    $currencyTextRaw = 'USD';

    $per_report_price = config('app.settings.per_report_price');
    $per_feature_price = config('app.settings.per_feature_report_price');
    $feature_report_duration =  intval(session()->get('feature_report_duration'));

    $sanitized_per_feature_price = \App\Helpers\SanitizeData::currency(floatval($per_feature_price));
    $sanitized_per_report_price = \App\Helpers\SanitizeData::currency(floatval($per_report_price));
    $sanitized_reward_amount = \App\Helpers\SanitizeData::currency(floatval(session()->get('reward_amount')));

    $comma_removed_reward_amount = floatVal(\App\Helpers\SanitizeData::removeCurrecnyAndComma($sanitized_reward_amount));
    $comma_removed_per_feature_price = floatval(\App\Helpers\SanitizeData::removeCurrecnyAndComma($sanitized_per_feature_price));
    $comma_removed_per_report_price = floatval(\App\Helpers\SanitizeData::removeCurrecnyAndComma($sanitized_per_report_price));

    $total = $comma_removed_reward_amount + $comma_removed_per_report_price + $feature_report_duration * $comma_removed_per_feature_price;
    $sanitized_total = \App\Helpers\SanitizeData::currency(floatval($total));
    session(['total' => $total]);
    ?>
    <div class="container">
        <div class="row justify-content-center mb-50">
            <div class="col-lg-12">
                <div class="report-form-payment-container">
                    <h3>Make a Payment</h3>
                    @if(session("failureMsg"))
                        <div class="alert alert-danger fade show mt-1" id="paymentErrorAlert" role="alert">
                            <span>{{ session("failureMsg") }}</span>
                        </div>
                    @endif
                    <div class="alert alert-danger fade show mt-1" id="validationErrorAlert" role="alert" style="display:none;">
                        <span id="validationErrorText"></span>
                    </div>
                    <div class="payment-details-wrap">
                        <div class="payment-title">
                            <ul>
                                <li>Title <span>Total</span></li>
                            </ul>
                        </div>
                        <div class="payment-value">
                            <ul>
                                <li>Report Pricing <span>{{$sanitized_per_report_price}} </span></li>
                                <li>Feature Report ({{$feature_report_duration}} days) <span>{{$feature_report_duration}} X {{$sanitized_per_feature_price}}</span></li>
                                <li>Reward Amount <span>{{$sanitized_reward_amount}}</span></li>
                            </ul>
                        </div>
                        <div class="payment-subtotal">
                            <ul>
                                <li>Subtotal <span>{{$sanitized_total}} </span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="payment-method-container">
                        <div class="payment-method-title">
                            <h3>Select a Payment Method</h3>
                            <img alt="" src="assets/images/icon-img/payment.png">
                        </div>
                        <div class="payment-method">
                            <div class="payment-select-div">
                                <input id="payment_method_stripe" class="input-radio" type="radio" checked="checked" name="payment_method_stripe">
                                <label for="payment_method_stripe">Stripe</label>
                            </div>

                            <div class="payment-box">
                                <p>Pay securely with your credit card via Stripe.</p>
                                <div class="col-lg-8 mt-20">
                                    <div id="stripe-card-element" class="xcard-input">
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
                                    <form action="{{route('checkout.fulfillOrder')}}"
                                          id="payment-form-stripe" name="stripePayForm" method="POST">
                                        @csrf
                                        <input type="hidden" id="transaction_stripe"
                                               name="transaction_id" />
                                        <input type="hidden" id="total_stripe" name="total" />
                                        <div class="place-order-flex-box">
                                            <div class="checkout-page Place-order">
                                                <button class="button btn btn-payment btn-dark btn-block"
                                                        id="payStartBtnStripe" form="payment-form-stripe"
                                                        type="submit">Place Order
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
                                <input id="payment_method_paypal" class="input-radio" type="radio" checked="checked" name="payment_method_paypal">
                                <label for="payment_method_paypal">Paypal</label>
                            </div>

                            <div class="payment-box">
                                <p>Pay securely with your credit card via Paypal.</p>
                                <div class="col-lg-8 mt-20">
                                    <div id="paypal-card-element">
                                        <!-- A Stripe Element will be inserted here. -->
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
                                        <input type="hidden" id="transaction_stripe"
                                               name="transaction_id" />
                                        <input type="hidden" id="total_stripe" name="total" />
                                        <div class="place-order-flex-box">
                                            <div class="checkout-page Place-order">
                                                <button class="button btn btn-payment btn-dark btn-block"
                                                        id="payStartBtnStripe" form="payment-form-stripe"
                                                        type="submit">Place Order
                                                </button>
                                            </div>
                                            <div class="spinner-border" id="payStartSpinner" role="status"  style="width: 2rem; height: 2rem; display: none">
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
@endsection
@section('page_level_script')
    @include('front.checkout.stripe-script')
@endsection
