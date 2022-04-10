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
                            <a type="button" href="{{route('dashboard.user-report.index')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table mb-0 table-borderless">
                            <tbody>
                            <tr>
                                <th scope="row">Report Type :</th>
                                <td>
                                  <span class="badge p-2 {{$report->report_type === \App\Models\Report::REPORT_TYPE_LOST? 'bg-danger' : 'bg-info'}}">
                                    {{ucwords($report->report_type)}}
                                  </span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Item Name :</th>
                                <td>{{ucwords($report->title)}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Brand :</th>
                                <td>{{ucwords($report->brand ?? 'Not Specified')}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Category :</th>
                                <td>{{ucwords($report->category->name)}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Description :</th>
                                <td>{{ucwords($report->description)}}</td>
                            </tr>
                            @if($report->report_type === \App\Models\Report::REPORT_TYPE_LOST)
                                <tr>
                                    <th style="white-space: nowrap;" scope="row">Reward:</th>
                                    <td>
                                        <span class="badge p-2 bg-info">
                                            ${{$report->reward ? ucwords($report->reward->reward_amount) : "0"}}
                                        </span>
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <th scope="row">Reported at :</th>
                                <td>{{\Carbon\Carbon::parse($report->created_at)->format('Y-m-d')}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="white-space:nowrap;">Contact Number :</th>
                                <td>{{$report->contact_number}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Location:</th>
                                <td>{{$report->location->address}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email :</th>
                                <td>{{$report->contact_email}}</td>
                            </tr>
                            @if($report->report_type === \App\Models\Report::REPORT_TYPE_FOUND)
                            <tr>
                                <th scope="row">Status :</th>
                                <td class="position-relative">
                                    <span id="report-status" class="badge p-2 {{$report->verified === 1? 'bg-success' : 'bg-danger'}}">
                                        {{$report->verified ? "Verified": "Pending"}}
                                    </span>
                                </td>
                            </tr>
                            @endif
                            @if($report->verifiedUser)
                                <tr>
                                    <?php
                                    $label = $report->report_type === \App\Models\Report::REPORT_TYPE_FOUND ? 'Item claimed to :' : 'Item found by :'
                                    ?>
                                    <th scope="col" style="white-space: nowrap">{{$label}}</th>
                                    <td>{{$report->verifiedUser->first_name.' '.$report->verifiedUser->last_name}}</td>
                                </tr>
                                @if($report->report_type === \App\Models\Report::REPORT_TYPE_LOST && $report->reward)
                                    <tr>
                                        <th>Reward</th>

                                        <td>
                                            @if($report->reward->owned_by === null)
                                            <a href="{{route('dashboard.user-reward.send', $report->slug)}}" class="btn btn-primary">
                                                Send Reward
                                            </a>
                                            @else
                                                Rewarded
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endif
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
                    @if($report->verified === 1 && $report->verified_user == null)
                        <hr>
                        <div class="py-2">
                            <h4 class="card-title mb-0">Claim Details</h4>
                        </div>
                        @if($report->claimUsers->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Claimed Date</th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($report->claimUsers as $user)
                                    <tr>
                                        <th scope="row">{{$user->first_name.' '.$user->last_name}}</th>
                                        <td>{{$user->email}}</td>
                                        <td>{{\Carbon\Carbon::parse($user->pivot->created_at)->format('d M, Y')}}</td>
                                        <td>
                                            <a href="{{route('dashboard.user-report.claim.show', ['user'=> $user->slug, 'report' => $report->slug])}}" class="btn btn-primary position-relative p-0 avatar-xs rounded waves-effect waves-light">
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
                            <div class="alert alert-danger">This report is not claimed by any user yet.</div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

