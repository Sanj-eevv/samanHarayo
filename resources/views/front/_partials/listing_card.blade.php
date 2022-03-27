@forelse($reports as $report)
<div class="row">
    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
        <div class="product-list-img">
                <h3 class="listing-badge badge bg-secondary p-2 mb-0">{{ucwords($report->report_type)}}</h3>
            <?php
            $src = $report->image ? asset('storage/uploads/report/'.$report->reported_by.'/item_image/'.$report->image) : asset('assets/images/common/placeholder.jpg')
            ?>
            <a href="{{route('front.details', $report->slug)}}">
                <img src="{{$src}}">
            </a>
        </div>
    </div>
    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
        <div class="shop-list-content">
            <h3><a href="{{route('front.details', $report->slug)}}">{{ucwords($report->title)}}</a></h3>
            @if($report->reward_amount)
                <span>${{$report->reward_amount}}</span>
            @endif
            <p class="clamp-line-3">{{\Illuminate\Support\Str::limit($report->description, 200, '...')}}</p>
            <span class="date-span text-black">Reported at: {{\Carbon\Carbon::parse($report->created_at)->format('d-m-Y') }}</span>
        </div>
    </div>
</div>
@empty
        <h3 class="sh-title">
            No Data Found
        </h3>
@endforelse
