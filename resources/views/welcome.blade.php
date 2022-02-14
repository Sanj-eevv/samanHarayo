@extends('layouts.front')
@section('content')
<div class="slider-area">
    <div class="container">
        <div class="hero-slider-active bg-gray-7">
            @foreach($featured_reports as $featured_report)
            <div class="single-hero-slider d-flex">
                <div class="hero-slider-content">
                        <h5>Item Lost</h5>
                        <h1>{{$featured_report->name}}</h1>
                        <p>{{\Illuminate\Support\Str::limit($featured_report->description, 140)}}</p>
                        <span><a href="#">More Details</a></span>
                </div>
                <div class="hero-slider-img">
                    <img class="img-fluid" src="{{asset('storage/uploads/featured/'.$featured_report->featured_photo->photo)}}" alt="">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="section-report-area">
    <div class="container section-report-area-wrapper">
            <a href="{{route('report-lost.index')}}">
                <span><i class="fas fa-pencil-alt"></i></span>
                Report Lost Product
            </a>
            <a href="{{route('report-found.index')}}">
                <span><i class="far fa-clipboard"></i>
                </span>Report Found Product
            </a>
    </div>
</div>
<div class="about-us-area mt-70 ">
    <div class="container">
        <div class="about-us-img">
                <img class="img-fluid" src="{{asset('assets/abc.svg')}}" alt="">
        </div>
        <div class="about-us-content">
            <h3>Introduce</h3>
            <p>We are living on the era of technology and innovation. As days are passing by the technology is also improving along with days. There has been drastic change in the technology which has direct impact on the life of the people. Every aspect of life is leaning towards the maximum use of technology for the better and easier lifestyle...
                <span class="text-primary"><a href="#">Read more.</a></span>
            </p>
            <h2>Sanju Bhandari</h2>
        </div>
    </div>
</div>
<div class="report-info-area mt-70">
    <div class="container">
        <div class="highlight">
            <div class="highlight--circle">
                    <div class="highlight--circle__content">
                        <strong>3333</strong> Items found
                    </div>
            </div>
        </div>
        <div class="highlight">
            <div class="highlight--circle">
                    <div class="highlight--circle__content">
                        <strong>21332</strong> items reported
                    </div>
            </div>
        </div>
        <div class="highlight ">
            <div class="highlight--circle">
                    <div class="highlight--circle__content">
                        <strong>3100</strong> items lost
                    </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area section-padding-1 mt-70">
    <div class="container">
        <div class="section-title-tab-wrap mb-45">
            <div class="section-title">
                <h2>Featured Products</h2>
            </div>
            <div class="tab-style-1 nav">
                <a class="active" href="#product-1" data-bs-toggle="tab">Best Seller</a>
                <a href="#product-2" data-bs-toggle="tab"> Trending</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="tab-content jump">
            <div id="product-1" class="tab-pane active">
                <div class="all_product_container">
                    <div class="single-product-wrap mb-35">
                        <div class="product-img product-img-zoom mb-20">
                            <a href="product-details.html">
                                <img src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-content-left">
                                <h4><a href="product-details.html">Simple Black T-Shirt</a></h4>
                                <div class="product-price">
                                    <span>$56.20</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-product-wrap mb-35">
                        <div class="product-img product-img-zoom mb-20">
                            <a href="product-details.html">
                                <img src="assets/images/product/product-2.jpg" alt="">
                            </a>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-content-left">
                                <h4><a href="product-details.html">Black Simple Sneaker</a></h4>
                                <div class="product-price">
                                    <span>$38.50</span>
                                </div>
                            </div>
                        </div>
                    </div>


                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="">
                                </a>
                                <span class="pro-badge left bg-red">-20%</span>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Lined Brown Swearshirt</a></h4>
                                    <div class="product-price">
                                        <span class="new-price">$46.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="{{asset('assets/logo.png')}}" alt="">
                                </a>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Norda Simple Backpack</a></h4>
                                    <div class="product-price">
                                        <span>$102.54</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-5.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-red">-15%</span>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Contrasting Sunglasses</a></h4>
                                    <div class="product-price">
                                        <span class="new-price">$35.45</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-6.jpg" alt="">
                                </a>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Simple Blue T-Shirt</a></h4>
                                    <div class="product-price">
                                        <span>$56.20</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-7.jpg" alt="">
                                </a>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Norda Sport Sneaker</a></h4>
                                    <div class="product-price">
                                        <span>$37.86</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="single-product-wrap mb-35">
                            <div class="product-img product-img-zoom mb-20">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-8.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-black">Out of stock</span>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-content-left">
                                    <h4><a href="product-details.html">Basic Sneaker</a></h4>
                                    <div class="product-price">
                                        <span>$46.20</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
            <div id="product-2" class="tab-pane">
                <div class="all_product_container">
                <div class="single-product-wrap mb-35">
                    <div class="product-img product-img-zoom mb-20">
                        <a href="product-details.html">
                            <img src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="">
                        </a>
                        <span class="pro-badge left bg-red">-20%</span>
                    </div>
                    <div class="product-content-wrap">
                        <div class="product-content-left">
                            <h4><a href="product-details.html">Lined Brown Swearshirt</a></h4>
                            <div class="product-price">
                                <span class="new-price">$46.00</span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="single-product-wrap mb-35">
                    <div class="product-img product-img-zoom mb-20">
                        <a href="product-details.html">
                            <img src="{{asset('assets/logo.png')}}" alt="">
                        </a>
                    </div>
                    <div class="product-content-wrap">
                        <div class="product-content-left">
                            <h4><a href="product-details.html">Norda Simple Backpack</a></h4>
                            <div class="product-price">
                                <span>$102.54</span>
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

