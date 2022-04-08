@extends('layouts.front')
@section('content')
    <div class="listing-area pt-25">
        <div class="container overflow-hidden">
            <div class="row gx-5">
                <div class="col-lg-12">
                    <div class="topbar-wrapper">
                        <div>
                            <p style="top: 0;">Showing {{$reports->count()}} of <span>{{$metaData['totalReports']}}</span> results </p>
                        </div>
                        <div class="product-sorting-wrapper">
                            <div class="product-show sorting-style">
                                <label>Sort by :</label>
                                <select id="sortby">
                                    <option value="{{route('front.search')}}?order=title&dir=asc" {{ ($metaData['order'] == 'title' && $metaData['dir'] == 'asc')?'selected': ''}}>Title</option>
                                    <option value="{{route('front.search')}}?order=created_at&dir=desc" {{ ($metaData['order'] == 'created_at' && $metaData['dir'] == 'desc')?'selected': ''}}>Latest Reported</option>
                                    <option value="{{route('front.search')}}?order=created_at&dir=asc" {{ ($metaData['order'] == 'created_at' && $metaData['dir'] == 'asc')?'selected': ''}}>Oldest Reported</option>
                                </select>
                            </div>
{{--                            <div class="product-filter sorting-style">--}}
{{--                                <label>Type :</label>--}}
{{--                                <select id="listing-type">--}}
{{--                                    <option value="0">Lost</option>--}}
{{--                                    <option value="1">Found</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div>
                        <div class="shop-list-wrap mb-30" id="listing-container">
                            @forelse($reports as $report)
                                <div class="row gy-3">
                                <div class="col-sm-5 col-md-4 col-lg-3">
                                    <div class="d-flex justify-content-center">
                                        <div class="product-list-img">
                                            <h3 class="listing-badge badge bg-secondary p-2 mb-0">{{ucwords($report->report_type)}}</h3>
                                            <?php
                                            $src = $report->randomImage ? asset('storage/uploads/report/'.$report->reported_by.'/item_image/'.$report->randomImage->image) : asset('assets/images/common/placeholder.jpg')
                                            ?>
                                            <a href="{{route('front.details', $report->slug)}}">
                                                <img src="{{$src}}" class="cover-image img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7 col-md-8 col-lg-9">
                                    <div class="shop-list-content">
                                        <h3><a href="{{route('front.details', $report->slug)}}">{{ucwords($report->title)}}</a></h3>
                                        @if($report->reward)
                                            <span>${{$report->reward->reward_amount}}</span>
                                        @endif
                                        <p class="clamp-line-3">{{\Illuminate\Support\Str::limit($report->description, 250, '...')}}</p>
                                        <span class="date-span text-black">Reported at: {{\Carbon\Carbon::parse($report->created_at)->format('d-m-Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <h3 class="sh-title">
                                    No Data Found
                                </h3>
                            @endforelse
                        </div>
                        <?php
                        $pageCount = $metaData['totalReports'] / $metaData['pageLimit'];
                        if(round($pageCount) !== $pageCount){
                            $pageCount = (int)ceil($pageCount);
                        }
                        ?>
                        <div class="pagination-style text-center mb-30 mt-15">
                            <ul>
                            @for($i=1; $i <= $pageCount; $i++)
                                    <?php
                                    $activeClass = "";
                                    if($metaData['page'] == $i ){
                                        $activeClass = 'active';
                                    }
                                    ?>
                                @if($i == 1)
                                <li class="{{($metaData['page'] == 1)?'disabled':''}}">
                                    <a class="prev" href="{{route('front.search')}}?page={{$metaData['page'] - 1}}&order={{$metaData['order']}}&dir={{$metaData['dir']}}">
                                        <i class="icon-arrow-left"></i>
                                    </a>
                                </li>
                                @endif
                                <li>
                                    <a class="{{$activeClass}}" href="{{route('front.search')}}?page={{$i}}&order={{$metaData['order']}}&dir={{$metaData['dir']}}">{{$i}}</a>
                                </li>
                                @if($i == $pageCount)
                                <li class="{{($metaData['page'] == $pageCount)?'disabled':''}}">
                                    <a class="next" href="{{route('front.search')}}?page={{$metaData['page'] + 1}}&order={{$metaData['order']}}&dir={{$metaData['dir']}}"><i class="icon-arrow-right"></i>
                                    </a>
                                </li>
                                @endif
                            @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_level_script')
    <script>
        $(function(){
            $('#sortby').change(function(){
                let url = $(this).val();
                location.href = url;
            });
        });
    </script>
@endsection
