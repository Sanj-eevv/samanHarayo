@extends('layouts.front')
@section('page_level_style')
    <style>
        .highlight {
            position: relative
        }
        .highlight:after {
            content: '';
            display: block;
            padding-top: 100%
        }

        .highlight--circle,.highlight--circle__wrapper,.highlight--circle__content,.highlight--circle:before,.highlight--circle:after {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translateX(-50%)translateY(-50%);
            transform: translateX(-50%)translateY(-50%);
            border-radius: 50%;
            background:  rgba(66,25,255,.06);
            transition: all .2s ease-out
        }

        .highlight--circle {
            width: 40%;
            height: 40%;
            cursor: default
        }

        .highlight--circle__wrapper {
            z-index: 3;
            width: 100%;
            height: 100%;
            /*background: rgba(34,44,255,.15)*/
        }

        .highlight--circle__content {
            text-transform: uppercase;
            text-align: center;
            color: #b9bcbe;
            font-size: .8em;
            line-height: 1.2;
            background: 0 0
        }

        .highlight--circle__content strong {
            display: block;
            margin-bottom: 10px;
            color: #fff;
            font-weight: 300;
            font-size: 2.333rem
        }

        .highlight--circle:before {
            z-index: 2;
            content: '';
            width: 150%;
            height: 150%
        }

        .highlight--circle:after {
            z-index: 1;
            content: '';
            width: 200%;
            height: 200%;
            transition-delay: .1s
        }

        @media only screen and (min-width: 768px) and (max-width: 991.5px){
            .highlight--circle__content strong {
                display: block;
                margin-bottom: 10px;
                color: #fff;
                font-weight: 300;
                font-size: 1.333rem
            }
        }

        @media only screen and (min-width: 576px) and (max-width: 767px){
            .highlight--circle {
                width: 60%;
                height: 60%;
                cursor: default
            }
            .highlight--circle:before {
                z-index: 2;
                content: '';
                width: 130%;
                height: 130%
            }
            .highlight--circle:after {
                z-index: 1;
                content: '';
                width: 160%;
                height: 160%;
                transition-delay: .1s
            }
            .highlight--circle__content strong {
                display: block;
                margin-bottom: 10px;
                color: #fff;
                font-weight: 300;
                font-size: 1.333rem
            }
        }

            .highlight--circle:hover:before,.highlight--circle:hover:after {
            background: rgba(22,22,22,.06)
        }

        .highlight--circle:hover:before {
            width: 155%;
            height: 155%
        }

        .highlight--circle:hover:after {
            width: 205%;
            height: 205%
        }
    </style>
@endsection
@section('content')
<div class="slider-area">
    <div class="container">
        <div class="hero-slider-active-2 nav-style-1 nav-style-1-modify nav-style-1-blue bg-gray-7">
            <div class="single-hero-slider slider-height-3 custom-d-flex custom-align-item-center single-animation-wrap">
                <div class="row align-items-center slider-animated-1">
                    <div class="col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="hero-slider-content-5">
                            <h5 class="animated">Item Lost</h5>
                            <h1 class="animated">Laptop Lenovo Ideapad 530s</h1>
                            <p class="animated">A laptop was found at Itahari near Vishwa Adarsha college.</p>
                            <p class="animated"><a href="#"><span class="animated" style="color: red;">More Details</span></a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="hm7-hero-slider-img">
                            <img class="animated" src="{{asset('storage/uploads/featured/Laptop.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-slider slider-height-3 custom-d-flex custom-align-item-center single-animation-wrap">
                <div class="row align-items-center slider-animated-1">
                    <div class="col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="hero-slider-content-5">
                            <h5 class="animated">Item Lost</h5>
                            <h1 class="animated">Laptop Lenovo Ideapad 530s</h1>
                            <p class="animated">A laptop was found at Itahari near Vishwa Adarsha college.</p>
                            <p class="animated"><a href="#"><span class="animated" style="color: red;">More Details</span></a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="hm7-hero-slider-img">
                            <img class="animated" src="{{asset('storage/uploads/featured/h.jfif')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-report-area pt-60">
    <div class="container">
        <div class="section-report-area-wrapper">
            <div class="row">
                <div class="col-md-6">
                    <button>Report Lost Product</button>
                </div>
                <div class="col-md-6 ">
                    <button class="float-end">Report Lost Product</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div class="service-area pt-70">--}}
{{--    <div class="container">--}}
{{--        <div class="service-wrap">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-3 col-md-6 col-sm-6 col-12">--}}
{{--                    <div class="single-service-wrap mb-30">--}}
{{--                        <div class="service-icon">--}}
{{--                            <i class="icon-cursor"></i>--}}
{{--                        </div>--}}
{{--                        <div class="service-content">--}}
{{--                            <h3>Free Shipping</h3>--}}
{{--                            <span>Orders over $100</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-md-6 col-sm-6 col-12">--}}
{{--                    <div class="single-service-wrap mb-30">--}}
{{--                        <div class="service-icon">--}}
{{--                            <i class="icon-reload"></i>--}}
{{--                        </div>--}}
{{--                        <div class="service-content">--}}
{{--                            <h3>Free Returns</h3>--}}
{{--                            <span>Within 30 days</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-md-6 col-sm-6 col-12">--}}
{{--                    <div class="single-service-wrap mb-30">--}}
{{--                        <div class="service-icon">--}}
{{--                            <i class="icon-lock"></i>--}}
{{--                        </div>--}}
{{--                        <div class="service-content">--}}
{{--                            <h3>100% Secure</h3>--}}
{{--                            <span>Payment Online</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-md-6 col-sm-6 col-12">--}}
{{--                    <div class="single-service-wrap mb-30">--}}
{{--                        <div class="service-icon">--}}
{{--                            <i class="icon-tag"></i>--}}
{{--                        </div>--}}
{{--                        <div class="service-content">--}}
{{--                            <h3>Best Price</h3>--}}
{{--                            <span>Guaranteed</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="about-us-area pt-60">
    <div class="container">
        <div class="border-bottom-1 about-content-pb">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="about-us-logo">
                        <h3 style="font-weight: bold">
                            Saman<span style="color: red;">Harayo</span>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="about-us-content">
                        <h3>Introduce</h3>
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias animi debitis deleniti ducimus ea eaque ipsum maiores maxime molestiae molestias, nesciunt qui quidem repellat repudiandae sapiente sint tempora, veniam vero? </p>
                        <div class="signature">
                            <h2>Sanju Bhandari</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="info-circle mt-15">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="highlight">
                    <div class="highlight--circle">
                        <div class="highlight--circle__wrapper">
                            <div class="highlight--circle__content">
                                <strong>33</strong> Items found
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="highlight">
                    <div class="highlight--circle">
                        <div class="highlight--circle__wrapper">
                            <div class="highlight--circle__content">
                                <strong>212</strong> items reported
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="highlight">
                    <div class="highlight--circle">
                        <div class="highlight--circle__wrapper">
                            <div class="highlight--circle__content">
                                <strong>3100</strong> items lost
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area section-padding-1 pt-50 pb-85">
    <div class="container">
        <div class="section-title-tab-wrap mb-45">
            <div class="section-title">
                <h2>Featured Products</h2>
            </div>
            <div class="tab-style-1 nav">
                <a class="active" href="#product-1" data-bs-toggle="tab">Best Seller</a>
                <a href="#product-2" data-bs-toggle="tab"> Trending</a>
                <a href="#product-3" data-bs-toggle="tab">New Arrivals </a>
                <a href="#product-4" data-bs-toggle="tab">All Products</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="tab-content jump">
            <div id="product-1" class="tab-pane active">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-1.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Simple Black T-Shirt</a></h4>
                                    <div class="product-price">
                                        <span>$56.20</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-2.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Black Simple Sneaker</a></h4>
                                    <div class="product-price">
                                        <span>$38.50</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-3.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-red">-20%</span>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Lined Brown Swearshirt</a></h4>
                                    <div class="product-price">
                                        <span class="new-price">$46.00</span>
                                        <span class="old-price">$66.75</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-4.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Norda Simple Backpack</a></h4>
                                    <div class="product-price">
                                        <span>$102.54</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-5.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-red">-15%</span>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Contrasting Sunglasses</a></h4>
                                    <div class="product-price">
                                        <span class="new-price">$35.45</span>
                                        <span class="old-price">$45.80</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-6.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Simple Blue T-Shirt</a></h4>
                                    <div class="product-price">
                                        <span>$56.20</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-7.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Norda Sport Sneaker</a></h4>
                                    <div class="product-price">
                                        <span>$37.86</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-8.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-black">Out of stock</span>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Basic Sneaker</a></h4>
                                    <div class="product-price">
                                        <span>$46.20</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="product-2" class="tab-pane">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-8.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Basic Sneaker</a></h4>
                                    <div class="product-price">
                                        <span>$56.20</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-7.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Norda Sport Sneaker</a></h4>
                                    <div class="product-price">
                                        <span>$38.50</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-6.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-red">-20%</span>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Simple Blue T-Shirt</a></h4>
                                    <div class="product-price">
                                        <span class="new-price">$46.00</span>
                                        <span class="old-price">$66.75</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-5.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Contrasting Sunglasses</a></h4>
                                    <div class="product-price">
                                        <span>$102.54</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-4.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-red">-15%</span>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Norda Simple Backpack</a></h4>
                                    <div class="product-price">
                                        <span class="new-price">$35.45</span>
                                        <span class="old-price">$45.80</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-3.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Lined Brown Swearshirt</a></h4>
                                    <div class="product-price">
                                        <span>$56.20</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-2.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Black Simple Sneaker</a></h4>
                                    <div class="product-price">
                                        <span>$37.86</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-1.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-black">Out of stock</span>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Simple Black T-Shirt</a></h4>
                                    <div class="product-price">
                                        <span>$46.20</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="product-3" class="tab-pane">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img class="default-img" src="assets/images/product/product-4.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Norda Simple Backpack</a></h4>
                                    <div class="product-price">
                                        <span>$56.20</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-3.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Lined Brown Swearshirt</a></h4>
                                    <div class="product-price">
                                        <span>$38.50</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-2.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-red">-20%</span>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Black Simple Sneaker</a></h4>
                                    <div class="product-price">
                                        <span class="new-price">$46.00</span>
                                        <span class="old-price">$66.75</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-1.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Simple Black T-Shirt</a></h4>
                                    <div class="product-price">
                                        <span>$102.54</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-8.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-red">-15%</span>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Basic Sneaker</a></h4>
                                    <div class="product-price">
                                        <span class="new-price">$35.45</span>
                                        <span class="old-price">$45.80</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-7.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Norda Sport Sneaker</a></h4>
                                    <div class="product-price">
                                        <span>$56.20</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-6.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Simple Blue T-Shirt</a></h4>
                                    <div class="product-price">
                                        <span>$37.86</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-5.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-black">Out of stock</span>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Contrasting Sunglasses</a></h4>
                                    <div class="product-price">
                                        <span>$46.20</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="product-4" class="tab-pane">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-6.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Simple Blue T-Shirt</a></h4>
                                    <div class="product-price">
                                        <span>$56.20</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-7.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Norda Sport Sneaker</a></h4>
                                    <div class="product-price">
                                        <span>$38.50</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-8.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-red">-20%</span>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Basic Sneaker</a></h4>
                                    <div class="product-price">
                                        <span class="new-price">$46.00</span>
                                        <span class="old-price">$66.75</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-5.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Contrasting Sunglasses</a></h4>
                                    <div class="product-price">
                                        <span>$102.54</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-4.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-red">-15%</span>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Norda Simple Backpack</a></h4>
                                    <div class="product-price">
                                        <span class="new-price">$35.45</span>
                                        <span class="old-price">$45.80</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-3.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Lined Brown Swearshirt</a></h4>
                                    <div class="product-price">
                                        <span>$56.20</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-2.jpg" alt="">
                                </a>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Black Simple Sneaker</a></h4>
                                    <div class="product-price">
                                        <span>$37.86</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-1.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-black">Out of stock</span>
                                <div class="product-action-wrap">
                                    <div class="product-action-left">
                                        <button><i class="icon-basket-loaded"></i>Add to Cart</button>
                                    </div>
                                    <div class="product-action-right tooltip-style">
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i><span>Quick View</span></button>
                                        <button class="font-inc"><i class="icon-refresh"></i><span>Compare</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Simple Black T-Shirt</a></h4>
                                    <div class="product-price">
                                        <span>$46.20</span>
                                    </div>
                                </div>
                                <div class="product-content-right tooltip-style">
                                    <button class="font-inc"><i class="icon-heart"></i><span>Wishlist</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
