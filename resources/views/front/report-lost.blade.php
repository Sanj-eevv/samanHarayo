@extends('layouts.front')
@section('content')
    <div class="checkout-main-area pb-50 pt-30">
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
                    <div class="Place-order">
                        <a href="#">Submit Report</a>
                    </div>
                </form>
        </div>
    </div>
@endsection()
