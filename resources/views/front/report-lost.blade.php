@extends('layouts.front')
@section('content')
    <div class="checkout-main-area pb-50 mt-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <form action="#">
                        <div class="report-form-container">
                            <div class="report-form-product-details">
                                <div class="row mb-20">
                                    <div class="col-lg-12">
                                        <label>Item name<abbr class="required" title="required">*</abbr></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="row mb-20">
                                    <div class="col-lg-12">
                                        <label>Item name<abbr class="required" title="required">*</abbr></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-20">
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
                                <div class="row">
                                    <div class="col-lg-12 mb-20">
                                        <label>Brand<abbr class="required" title="required">*</abbr></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-20">
                                        <label>Additional info<abbr class="required" title="required">*</abbr></label>
                                        <textarea placeholder="Give more details about your product" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('front._google-map')
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="report-form-payment-container mt-20">
                        <h3>Your order</h3>
                        <div class="payment-details-wrap">
                                <div class="payment-title">
                                    <ul>
                                        <li>Product <span>Total</span></li>
                                    </ul>
                                </div>
                                <div class="payment-value">
                                    <ul>
                                        <li>Product Name X 1 <span>$329 </span></li>
                                        <li>Product Name X 1 <span>$329 </span></li>
                                    </ul>
                                </div>
                                <div class="payment-subtotal">
                                    <ul>
                                        <li>Subtotal <span>$329 </span></li>
                                    </ul>
                                </div>
                        </div>
                        <div class="payment-method-container">
                                <div class="sin-payment payment-method">
                                    <input id="payment_method_1" class="input-radio" type="radio" value="cheque" checked="checked" name="payment_method">
                                    <label for="payment_method_1"> Direct Bank Transfer </label>
                                    <div class="payment-box payment_method_bacs">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                    </div>
                                </div>
                                <div class="sin-payment sin-payment-3 payment-method">
                                    <input id="payment-method-4" class="input-radio" type="radio" value="cheque" name="payment_method">
                                    <label for="payment-method-4">PayPal <img alt="" src="assets/images/icon-img/payment.png"></label>
                                    <div class="payment-box payment_method_bacs">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                    </div>
                                </div>
                        </div>
                        <div class="Place-order">
                            <a href="#">Place Order</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection()
@section('page_level_script')
@endsection
