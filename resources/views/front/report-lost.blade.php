@extends('layouts.front')
@section('content')
    <div class="checkout-main-area pb-20 pt-20">
        <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap">
                            <form action="#">
                                <div class="customer-zone mb-20">
                                    <p class="checkout-click cart-page-title">My Information
                                        <a href="#">
                                            <i class="fas fa-caret-down"></i>
                                        </a>
                                    </p>
                                    <div class="checkout-login-info">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info mb-20">
                                                        <label>First Name <abbr class="required" title="required">*</abbr></label>
                                                        <input type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info mb-20">
                                                        <label>Last Name <abbr class="required" title="required">*</abbr></label>
                                                        <input type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
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
                    <div class="col-lg-5">
                        <div class="your-order-area">
                            <h3>Recently Reported</h3>
                            <div class="shop-list-wrap mb-30">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-5 col-md-4 col-sm-4 col-4">
                                        <div class="product-list-img">
                                            <a href="product-details.html">
                                                <img src="assets/images/product/product-13.jpg" alt="Product Style">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-7 col-md-8 col-sm-8 col-8">
                                        <div class="shop-list-content">
                                            <h3><a href="product-details.html">Basic Joggin Shorts</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipic it</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-list-wrap mb-30">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-5 col-md-4 col-sm-4 col-4">
                                        <div class="product-list-img">
                                            <a href="product-details.html">
                                                <img src="assets/images/product/product-13.jpg" alt="Product Style">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-7 col-md-8 col-sm-8 col-8">
                                        <div class="shop-list-content">
                                            <h3><a href="product-details.html">Basic Joggin Shorts</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipic it</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection()
