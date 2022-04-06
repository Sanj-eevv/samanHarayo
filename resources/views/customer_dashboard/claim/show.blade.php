@extends('layouts.customer_dashboard')
@section('title', 'Report Details')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">Report Details</h4>
                        <div class="d-flex flex-wrap gap-2 justify-content-end">
                            <a type="button" href="{{route('customerDashboard.claim')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table mb-0 table-borderless">
                            <tbody>
                            <tr>
                                <th scope="row" style="white-space: nowrap">Item Name :</th>
                                <td>{{ucwords($report->title)}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="white-space: nowrap">Brand :</th>
                                <td>{{ucwords($report->brand ?? 'Not Specified')}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="white-space: nowrap">Category :</th>
                                <td>{{ucwords($report->category->name)}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="white-space: nowrap">Description :</th>
                                <td>{{ucwords($report->description)}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="white-space: nowrap">Reported at :</th>
                                <td>{{\Carbon\Carbon::parse($report->created_at)->format('d M, Y')}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="white-space: nowrap">Claimed at :</th>
                                <td>{{\Carbon\Carbon::parse($claim_user->created_at)->format('d M, Y')}}</td>
                            </tr>
                            <tr>
                                <th style="white-space: nowrap;" scope="row">Description :</th>
                                <td>{{$claim_user->description}}</td>
                            </tr>
                            <tr>
                                <th style="white-space: nowrap;" scope="row">Detail Status :</th>
                                <td>
                                    <?php
                                    $report_status = $claim_user->detail_status;
                                    $bg_color = 'bg-danger';
                                    switch ($report_status){
                                        case \App\Models\Report::DETAIL_STATUS[0]:
                                            $bg_color = 'bg-info';
                                            break;
                                        case \App\Models\Report::DETAIL_STATUS[1]:
                                            $bg_color = 'bg-success';
                                    }
                                    ?>
                                    <span id="report-status" class="badge p-2 {{$bg_color}}">
                                        {{ucwords($claim_user->detail_status)}}
                                </span>
                                </td>
                            </tr>
                            @if($claim_user->detail_status === \App\Models\Report::DETAIL_STATUS[1] )
                            <tr>
                                <th style="white-space: nowrap;" scope="row">Report Status :</th>
                                <td>
                                    <?php
                                    $report_status = $claim_user->report_status;
                                    $bg_color = 'bg-danger';
                                    switch ($report_status){
                                        case \App\Models\Report::REPORT_STATUS[0]:
                                            $bg_color = 'bg-info';
                                            break;
                                        case \App\Models\Report::REPORT_STATUS[1]:
                                            $bg_color = 'bg-success';
                                    }
                                    ?>
                                    <span id="report-status" class="badge p-2 {{$bg_color}}">
                                        {{ucwords($claim_user->report_status)}}
                                </span>
                                </td>
                            </tr>
                            @endif
                            @if($claim_user->report_status === App\Models\Report::REPORT_STATUS[1])
                            <tr>
                                <th scope="row" style="white-space: nowrap;">Contact Number :</th>
                                <td>{{$report->contact_number}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="white-space: nowrap;">Location:</th>
                                <td>{{$location->address}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="white-space: nowrap;">Email :</th>
                                <td>{{$report->contact_email}}</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">Item Images</h4>
                    </div>
                    <div class="magnetic-container">
                        @forelse($item_images as $image)
                            <a href="{{asset('storage/uploads/report/'.$user->id.'/claimed/'.$image->image)}}">
                                <img src="{{asset('storage/uploads/report/'.$user->id.'/claimed/'.$image->image)}}" class="cover-image popup-img img-fluid"  alt="">
                            </a>
                        @empty
                            <div class="alert alert-danger">Images not available.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

