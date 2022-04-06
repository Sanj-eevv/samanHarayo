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
                            <a type="button" href="{{route('customerDashboard.report.show', $report->slug)}}" class="btn btn-secondary waves-effect waves-light">Back</a>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table mb-0 table-borderless">
                            <tbody>
                            <tr>
                                <th style="white-space: nowrap;" scope="row">Item Name :</th>
                                <td>{{ucwords($report->title)}}</td>
                            </tr>
                            <tr>
                                <th style="white-space: nowrap;" scope="row">Claimed by :</th>
                                <td>{{ucwords($user->first_name).' '.ucwords($user->last_name)}}</td>
                            </tr>
                            <tr>
                                <th style="white-space: nowrap;" scope="row">Description :</th>
                                <td>{{$claim_detail->description}}</td>
                            </tr>
                            <tr>
                                <th style="white-space: nowrap;" scope="row">Description :</th>
                                <td>{{\Carbon\Carbon::parse($claim_detail->created_at)->format('d M, Y')}}</td>
                            </tr>
                            <tr>
                                <th style="white-space: nowrap;" scope="row">Report Status :</th>
                                <td>
                                    <?php
                                    $report_status = $claim_detail->report_status;
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
                                        {{ucwords($report_status)}}
                                </span>
                                </td>
                            </tr>
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

