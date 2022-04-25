@extends('layouts.front')
@section('content')
@if($featured_reports)
<div class="slider-area  pt-25">
    <div class="container">
        <div class="hero-slider-active bg-gray-7">
            @foreach($featured_reports as $featured_report)
            <div class="single-hero-slider d-flex">
                <div class="hero-slider-content">
                        <h5>Item Lost</h5>
                        <h1>{{ucwords($featured_report->report->title)}}</h1>
                        <p>{{\Illuminate\Support\Str::limit($featured_report->report->description, 140)}}</p>
                        <span><a href="{{route('front.details', $featured_report->report->slug)}}">More Details</a></span>
                </div>
                <div class="hero-slider-img">
                    <img class="img-fluid" src="{{asset('storage/uploads/report/'.$featured_report->report->reported_by.'/feature_image/'.$featured_report->feature_image)}}" alt="">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<div class="section-report-area mt-70">
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
                <img class="img-fluid" src="{{asset('assets/images/common/home_about.svg')}}" alt="">
        </div>
        <div class="about-us-content">
            <h3 class="sh-title">Introduce</h3>
            <p>We are living on the era of technology and innovation. As days are passing by the technology is also improving along with days. There has been drastic change in the technology which has direct impact on the life of the people. Every aspect of life is leaning towards the maximum use of technology for the better and easier lifestyle.
{{--                <span class="text-primary"><a href="#">Read more.</a></span>--}}
            </p>
{{--            <h2>Sanju Bhandari</h2>--}}
        </div>
    </div>
</div>
<div class="report-info-area mt-70">
    <div class="container">
        <div class="highlight">
            <div class="highlight--circle">
                    <div class="highlight--circle__content">
                        <strong>{{$found_count}}</strong> Items found
                    </div>
            </div>
        </div>
        <div class="highlight">
            <div class="highlight--circle">
                    <div class="highlight--circle__content">
                        <strong>{{$total_count}}</strong> items reported
                    </div>
            </div>
        </div>
        <div class="highlight ">
            <div class="highlight--circle">
                    <div class="highlight--circle__content">
                        <strong>{{$lost_count}}</strong> items lost
                    </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area mt-70 pb-70">
    <div class="container">
        <div class="product-title-wrapper">
            <div class="section-title">
                <h2 class="sh-title">Recently Reported</h2>
            </div>
            <div class="section-nav">
                <button class="active lost-product-btn">Lost</button>
                <button class="found-product-btn">Found</button>
            </div>
        </div>
        <div class="product-grid">
        @foreach($lost_reports as $lost_report)
                <div class="single-product-wrap lost-product product-item">
                    <div class="product-img">
                    @if($lost_report->randomImage)
                        <a href="{{route('front.details', $lost_report->slug)}}">
                            <img src="{{asset('storage/uploads/report/'.$lost_report->reported_by.'/item_image/'.$lost_report->randomImage->image)}}" alt="" class="img-fluid">
                        </a>
                        @if($lost_report->reward)
                        <span class="pro-badge bg-red">Reward: ${{$lost_report->reward->reward_amount}}</span>
                        @endif
                    @else
                        <a href="{{route('front.details', $lost_report->slug)}}">
                    <img src="{{asset('assets/images/common/placeholder.jpg')}}" alt="" class="img-fluid"/>
                        </a>
                    @endif
                    </div>
                    <h4><a href="" class="clamp-line-1">{{ucwords($lost_report->title)}}</a></h4>
                </div>
            @endforeach
            @foreach($found_reports as $found_report)
                <article class="single-product-wrap found-product product-item">
                    <div class="product-img">
                        @if($found_report->randomImage)
                            <a href="{{route('front.details', $found_report->slug)}}">
                                <img src="{{asset('storage/uploads/report/'.$found_report->reported_by.'/item_image/'.$found_report->randomImage->image)}}" alt="" class="img-fluid">
                            </a>
                        @else
                            <a href="{{route('front.details', $found_report->slug)}}">
                            <img src="{{asset('assets/images/common/placeholder.jpg')}}" alt="" class="img-fluid"/>
                            </a>
                        @endif
                </div>
                <h4><a href="" class="underlined-link">{{ucwords($found_report->title)}}</a></h4>
            </article>
            @endforeach
        </div>
    </div>
</div>

@endsection

