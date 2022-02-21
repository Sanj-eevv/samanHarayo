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
<div class="product-area mt-70 pb-70">
    <div class="container">
        <div class="product-title-wrapper">
            <div class="section-title">
                <h2>Featured Products</h2>
            </div>
            <div class="section-nav">
                <button class="active" href="#">Best Seller</button>
                <button href="#"> Trending</button>
            </div>
        </div>
        <div class="all_product_container">
        @foreach($lost_reports as $lost_report)
                <div class="single-product-wrap">

                    <div class="product-img">
                    @if($lost_report->random_photo)
                        @php
                            $src = $lost_report->random_photo->featured === "yes" ? asset('storage/uploads/featured/'.$lost_report->random_photo->photo) : asset('storage/uploads/report/'.$lost_report->random_photo->photo)
                       @endphp
                        <a href="#">
                            <img src="{{$src}}" alt="" class="img-fluid">
                        </a>
                        @if($lost_report->reward)
                        <span class="pro-badge bg-red">Reward: ${{$lost_report->reward->reward_amount}}</span>
                        @endif
                    @else
                        <img src="{{asset('storage/uploads/report/placeholder.jpg')}}" alt="" class="img-fluid">
                    @endif
                    </div>
                    <h4><a href="#" class="underlined-link">{{$lost_report->name.' '.($lost_report->brand ? '('.$lost_report->brand.')' : '')}}</a></h4>
                </div>
            @endforeach
            @foreach($found_reports as $found_report)
                    <div class="single-product-wrap">
                        <div class="product-img">
                            <a href="#">
                                <img src="{{asset('storage/uploads/report/'.$found_report->random_photo->photo)}}" alt="" class="img-fluid">
                        </a>
                    </div>
                    <h4><a href="#" class="underlined-link">{{$found_report->name.' '.($found_report->brand ? '('.$found_report->brand.')' : '')}}</a></h4>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

