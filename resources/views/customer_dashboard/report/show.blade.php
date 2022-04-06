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
                            <a type="button" href="{{route('customerDashboard.report')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
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
                                <td>{{$location->address}}</td>
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
                                    <th scope="col" style="white-space: nowrap">Item Claimed To : </th>
                                    <td>{{$report->verifiedUser->first_name.' '.$report->verifiedUser->last_name}}</td>
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
                                            <a href="{{route('customerDashboard.report.claim.show', ['user'=> $user->slug, 'report' => $report->slug])}}" class="btn btn-primary position-relative p-0 avatar-xs rounded waves-effect waves-light">
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
@section('page_level_script')
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function($) {--}}
{{--            $('#toggle-report-status').click(function (e){--}}
{{--                e.preventDefault();--}}
{{--                let span_report_status = $('#report-status');--}}
{{--                let current_report_status = span_report_status.text().trim();--}}
{{--                let report_id = JSON.parse("{{ json_encode($report->id) }}");--}}
{{--                $.ajax({--}}
{{--                    url: BASE_URL+'/dashboard/found-reports/'+report_id,--}}
{{--                    type: 'PUT',--}}
{{--                    "tryCount" : 0,--}}
{{--                    "retryLimit" : 3,--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-Token': CSRF_TOKEN--}}
{{--                    },--}}
{{--                    beforeSend: function() {--}}
{{--                        if(current_report_status === 'Verified'){--}}
{{--                            span_report_status.text("Pending");--}}
{{--                            span_report_status.removeClass('bg-success');--}}
{{--                            span_report_status.addClass('bg-danger');--}}
{{--                        }else{--}}
{{--                            span_report_status.removeClass('bg-danger');--}}
{{--                            span_report_status.addClass('bg-success');--}}
{{--                            span_report_status.text("Verified");--}}
{{--                        }--}}
{{--                    },--}}
{{--                    success: function (resp){--}}
{{--                        let new_status = resp.report_status;--}}
{{--                        toastSuccess(resp.message);--}}
{{--                    },--}}
{{--                    error: function (xhr,ajaxOptions, thrownError){--}}
{{--                        if (xhr.status === 500) {--}}
{{--                            this.tryCount++;--}}
{{--                            if (this.tryCount <= this.retryLimit) {--}}
{{--                                //try again--}}
{{--                                $.ajax(this);--}}
{{--                            }--}}
{{--                        }--}}
{{--                        span_report_status.text(current_report_status);--}}
{{--                        if(current_report_status === 'Pending'){--}}
{{--                            span_report_status.removeClass('bg-success');--}}
{{--                            span_report_status.addClass('bg-danger');--}}
{{--                        }else{--}}
{{--                            span_report_status.removeClass('bg-danger');--}}
{{--                            span_report_status.addClass('bg-success');--}}
{{--                        }--}}
{{--                        let obj = JSON.parse(xhr.responseText);--}}
{{--                        if(obj.message){--}}
{{--                            toastError(obj.message);--}}
{{--                        }else{--}}
{{--                            toastError("Something went wrong !!!");--}}
{{--                        }--}}
{{--                    }--}}
{{--                });--}}

{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endsection

