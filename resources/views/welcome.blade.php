@extends('layouts.front')
@section('content')
<div class="slider-area mt-10">
    <div class="container">
        <div class="hero-slider-active nav-style bg-gray-7">
            <div class="single-hero-slider slider-height custom-d-flex custom-align-item-center single-animation-wrap">
                <div class="row align-items-center slider-animated-1">
                    <div class="col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="hero-slider-content">
                            <h5 class="animated">Item Lost</h5>
                            <h1 class="animated">Laptop Lenovo Ideapad 530s</h1>
                            <p class="animated content">A laptop was found at Itahari near Vishwa Adarsha college.A laptop was found at Itahari near Vishwa Adarsha college. Adarsha college.</p>
                            <p class="animated more"><a href="#"><span class="animated">More Details</span></a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="hm7-hero-slider-img">
                            <img class="animated" src="{{asset('storage/uploads/featured/Laptop.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-slider slider-height custom-d-flex custom-align-item-center single-animation-wrap">
                <div class="row align-items-center slider-animated-1">
                    <div class="col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="hero-slider-content">
                            <h5 class="animated">Item Lost</h5>
                            <h1 class="animated">Laptop Lenovo Ideapad 530s</h1>
                            <p class="animated content">A laptop was found at Itahari near Vishwa Adarsha college.A laptop was found at Itahari near Vishwa Adarsha college. Adarsha college.</p>
                            <p class="animated"><a href="#"><span class="animated">More Details</span></a></p>
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
<div class="section-report-area pt-50">
    <div class="container">
        <div class="section-report-area-wrapper">
            <div class="row">
                <div class="col-md-6">
                    <button class="animated">
                        <span><i class="fas fa-pencil-alt"></i></span>
                        Report Lost Product
                    </button>
                </div>
                <div class="col-md-6 ">
                    <button class="animated float-end">
                        <span><i class="far fa-clipboard"></i>
                        </span>Report Found Product
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about-us-area pt-50">
    <div class="container">
        <div class="border-bottom-1 about-content-pb">
            <div class="row">
{{--                <div class="col-lg-3 col-md-3">--}}
{{--                    <div class="about-us-logo">--}}
{{--                        <a href="{{route('front.index')}}">--}}
{{--                            <img src="{{asset('assets/logo.png')}}">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-lg-12 col-md-12">
                    <div class="about-us-content">
                        <h3>Introduce</h3>
                        <p>We are living on the era of technology and innovation. As days are passing by the technology is also improving along with days.
                            There has been drastic change in the technology which has direct impact on the life of the people.
                            Every aspect of life is leaning towards the maximum use of technology for the better and easier lifestyle.
                        </p>
                        <div class="signature">
                            <h2>Sanju Bhandari</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="report-info-area mt-15">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="highlight">
                    <div class="highlight--circle">
                            <div class="highlight--circle__content">
                                <strong>3333</strong> Items found
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="highlight">
                    <div class="highlight--circle">
                            <div class="highlight--circle__content">
                                <strong>21332</strong> items reported
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="highlight ">
                    <div class="highlight--circle">
                            <div class="highlight--circle__content">
                                <strong>3100</strong> items lost
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
    <div class="container">
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
