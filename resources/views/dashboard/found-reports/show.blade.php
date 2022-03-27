@extends('layouts.dashboard')
@section('title', 'Report Details')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-end">
{{--                        <h4 class="card-title mb-0">Add user</h4>--}}
                        <div class="d-flex flex-wrap gap-2 justify-content-end">
                            <a type="button" href="{{route('found-reports.index')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
                            <button onclick="confirmDelete(() => {deleteReport({{$report->id}},true)})" class="btn btn-danger waves-effect waves-light">Delete</button>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table mb-0 table-borderless">
                            <tbody>
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
                                <th scope="row">Contact Number :</th>
                                <td>{{$report->contact_number}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Location:</th>
                                <td>{{$location->address}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Latitude:</th>
                                <td>{{$location->latitude}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Longitude:</th>
                                <td>{{$location->longitude}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email :</th>
                                <td>{{$report->contact_email}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Status :</th>
                                <td class="position-relative">
                                    <span id="report-status" class="badge p-2 {{$report->verified === 1? 'bg-success' : 'bg-danger'}}">
                                        {{$report->verified ? "Verified": "Pending"}}
                                    </span>
                                    <button id="toggle-report-status" class="btn">
                                        <span><i class="mdi mdi-menu-swap"></i></span>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_level_script')
    @include('dashboard.found-reports._shared')
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#toggle-report-status').click(function (e){
                e.preventDefault();
                let span_report_status = $('#report-status');
                let current_report_status = span_report_status.text().trim();
                let report_id = JSON.parse("{{ json_encode($report->id) }}");
                $.ajax({
                    url: BASE_URL+'/dashboard/found-reports/'+report_id,
                    type: 'PUT',
                    "tryCount" : 0,
                    "retryLimit" : 3,
                    headers: {
                        'X-CSRF-Token': CSRF_TOKEN
                    },
                    beforeSend: function() {
                        if(current_report_status === 'Verified'){
                            span_report_status.text("Pending");
                            span_report_status.removeClass('bg-success');
                            span_report_status.addClass('bg-danger');
                        }else{
                            span_report_status.removeClass('bg-danger');
                            span_report_status.addClass('bg-success');
                            span_report_status.text("Verified");
                        }
                    },
                    success: function (resp){
                        let new_status = resp.report_status;
                        toastSuccess(resp.message);
                    },
                    error: function (xhr,ajaxOptions, thrownError){
                        if (xhr.status === 500) {
                            this.tryCount++;
                            if (this.tryCount <= this.retryLimit) {
                                //try again
                                $.ajax(this);
                            }
                        }
                        span_report_status.text(current_report_status);
                        if(current_report_status === 'Pending'){
                            span_report_status.removeClass('bg-success');
                            span_report_status.addClass('bg-danger');
                        }else{
                            span_report_status.removeClass('bg-danger');
                            span_report_status.addClass('bg-success');
                        }
                        let obj = JSON.parse(xhr.responseText);
                        if(obj.message){
                            toastError(obj.message);
                        }else{
                            toastError("Something went wrong !!!");
                        }
                    }
                });

            });
        });
    </script>
@endsection

