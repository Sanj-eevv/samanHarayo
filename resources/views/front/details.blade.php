@extends('layouts.front')
@section('content')
    <div class="product-details-area pt-25 pb-115 container">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="product-details-big-img-slider">
                        @forelse($report->itemImages as $item_image)
                            <a href="#">
                                <img src="{{asset('storage/uploads/report/'.$report->reported_by.'/item_image/'.$item_image->image)}}" alt="" class="img-fluid">
                            </a>
                        @empty
                            <a href="#">
                                <img src="{{asset('assets/images/common/placeholder.jpg')}}" alt="" class="img-fluid">
                            </a>
                        @endforelse
                    </div>
                    <div class="product-details-small-img-slider">
                        @forelse($report->itemImages as $item_image)
                            <div>
                                <img src="{{asset('storage/uploads/report/'.$report->reported_by.'/item_image/'.$item_image->image)}}" alt="" class="img-fluid">
                            </div>
                        @empty
                            <div>
                                <img src="{{asset('assets/images/common/placeholder.jpg')}}" alt="" class="img-fluid">
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-details-content">
                        <h2>{{ucwords($report->title)}}</h2>
                        <div class="info">
                            <h3>Categories:</h3>
                            <span>{{ucwords($report->category->name)}}</span>
                        </div>
                        <div class="info">
                            <h3>Brand:</h3>
                            <span>{{$report->brand ? ucwords($report->brand) : "Not Specified"}}</span>
                        </div>
                        @if($report->report_type === \App\Models\Report::REPORT_TYPE_LOST)
                        <div class="info">
                            <h3>Reward:</h3>
                            <span class="price">{{$report->reward ? \App\Helpers\SanitizeData::currency($report->reward->reward_amount) : "$0"}}</span>
                        </div>
                        @endif
                        <div class="info">
                            <h3>Reported at:</h3>
                            <span>{{\Carbon\Carbon::parse($report->created_at)->format('d M, Y')}}</span>
                        </div>
                        <div class="info">
                            <h3>Location:</h3>
                            <span class="pb-2 d-inline-block">{{$report->location->address}}</span>
                            <iframe
                                style="border:0"
                                loading="lazy"
                                src="https://www.google.com/maps/embed/v1/place?key={{config('services.google_map.api_key')}}&q={{$report->location->latitude}},{{$report->location->longitude}}&zoom=18">
                            </iframe>
                        </div>
                        @if($report->report_type === \App\Models\Report::REPORT_TYPE_LOST)
                            <a class="sh-btn {{$disabled ? 'disabled' : '' }}" href="{{route('identity.index', ['report' => $report->slug])}}">I've This Item</a>
                        @else
                            <a class="sh-btn {{$disabled ? 'disabled' : '' }}" href="{{route('identity.index',['report'=>$report->slug])}}">This Belongs to Me</a>
                        @endif
                    </div>
                </div>
            </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <h4 class="d-inline-block sh-title">Description</h4>
                <p class="desc-para">{{$report->description}}</p>
            </div>
        </div>
    </div>
@endsection
