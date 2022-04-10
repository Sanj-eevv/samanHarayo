@extends('layouts.dashboard')
@section('title', 'Report Details')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">Report Details</h4>
                        <div class="d-flex flex-wrap gap-2 justify-content-end">
                            <a type="button" href="{{route('lost-reports.index')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
                            <button onclick="confirmDelete(() => {deleteReport({{$report->id}},true)})" class="btn btn-danger waves-effect waves-light">Delete</button>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table mb-0 table-borderless">
                            <tbody>
                            <tr>
                                <th scope="row" style="white-space: nowrap;">Item Name :</th>
                                <td>{{ucwords($report->title)}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="white-space: nowrap;">Brand :</th>
                                <td>{{ucwords($report->brand ?? 'Not Specified')}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="white-space: nowrap;">Category :</th>
                                <td>{{ucwords($report->category->name)}}</td>
                            </tr>
                            @if($report->reward)
                            <tr>
                                <th scope="row" style="white-space: nowrap;">Reward :</th>
                                <td> <span class="badge p-2 bg-info">
                                            ${{ucwords($report->reward->reward_amount)}}
                                        </span>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <th scope="row" style="white-space: nowrap;">Description :</th>
                                <td>{{ucwords($report->description)}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="white-space: nowrap;">Reported at :</th>
                                <td>{{\Carbon\Carbon::parse($report->created_at)->format('Y-m-d')}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="white-space: nowrap;">Contact Number :</th>
                                <td>{{$report->contact_number}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="white-space: nowrap;">Location:</th>
                                <td>{{$report->location->address}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="white-space: nowrap;">Latitude:</th>
                                <td>{{$report->location->latitude}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="white-space: nowrap;">Longitude:</th>
                                <td>{{$report->location->longitude}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="white-space: nowrap;">Email :</th>
                                <td>{{$report->contact_email}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">Item Images</h4>
                    </div>
                    <div class="magnetic-container">
                        @forelse($report->itemImages as $image)
                            <a href="{{asset('storage/uploads/report/'.$report->reported_by.'/item_image/'.$image->image)}}">
                                <img src="{{asset('storage/uploads/report/'.$report->reported_by.'/item_image/'.$image->image)}}" class="cover-image popup-img img-fluid"  alt="">
                            </a>
                        @empty
                            <div class="alert alert-danger">Images not available.</div>
                        @endforelse
                    </div>
                    <hr>
                    <div class="pb-2">
                        <h4 class="card-title mb-0">Claim Details</h4>
                    </div>
                    @if($report->claimUsers->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Detail Status</th>
                                    <th>Claimed Date</th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($report->claimUsers as $user)
                                    <tr>
                                        <th scope="row">{{$user->first_name.' '.$user->last_name}}</th>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <?php
                                            $report_status = $user->pivot->detail_status;
                                            $bg_color = 'bg-danger';
                                            switch ($report_status){
                                                case \App\Models\Report::REPORT_STATUS[0]:
                                                    $bg_color = 'bg-info';
                                                    break;
                                                case \App\Models\Report::REPORT_STATUS[1]:
                                                    $bg_color = 'bg-success';
                                            }
                                            ?>
                                            <span class="badge p-2 {{$bg_color}}">
                                        {{ucwords($report_status)}}
                                    </span>
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($user->pivot->created_at)->format('d M, Y')}}</td>
                                        <td>
                                            <a href="{{route('dashboard.claim.show', ['user'=> $user->slug, 'report' => $report->slug])}}" class="btn btn-primary position-relative p-0 avatar-xs rounded waves-effect waves-light">
                                            <span class="avatar-title bg-transparent">
                                                <i class="mdi mdi-eye-outline"></i>
                                            </span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-danger">This report is not claime by any user yet.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_level_script')
    @include('dashboard.lost-reports._shared')
@endsection

