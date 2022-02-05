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
                        <table class="table table-nowrap mb-0 table-borderless">
                            <tbody>
                            <tr>
                                <th scope="row">Item Name :</th>
                                <td>{{ucwords($report->name)}}</td>
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
                                <td class="position-relative"><span id="report-status" class="badge p-2 {{$report->status === 'verified'? 'bg-success' : 'bg-danger'}}">{{ucwords($report->status)}}</span><button id="toggle-report-status" class="btn"><span><i class="mdi mdi-menu-swap"></i></span></button></td>
                            </tr>
{{--                            <tr>--}}
{{--                                <th scope="row">Image: </th>--}}
{{--                                @php--}}
{{--                                    $img_src = asset('assets/media/avatars/blank.png');--}}
{{--                                    if ($user->avatar) {--}}
{{--                                        $img_src = asset('storage/uploads/profiles/' . $user->avatar);--}}
{{--                                    }--}}
{{--                                @endphp--}}
{{--                                <td>--}}
{{--                                    <img class="rounded avatar-md" src="{{$img_src}}" data-holder-rendered="true">--}}
{{--                                </td>--}}
{{--                            </tr>--}}
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
                let report_status = span_report_status.text();
                let updated_status = '';
                if(report_status === 'Pending'){
                    updated_status = 'Verified';
                }else{
                    updated_status = 'Pending';
                }
                let report_id = JSON.parse("{{ json_encode($report->id) }}");
                $.ajax({
                    url: BASE_URL+'/dashboard/found-reports/'+report_id,
                    type: 'PUT',
                    headers: {
                        'X-CSRF-Token': CSRF_TOKEN
                    },
                    data:{
                        'status': updated_status
                    },
                    beforeSend: function() {
                        if(report_status === 'Pending'){
                            span_report_status.removeClass('bg-danger');
                            span_report_status.addClass('bg-success');
                        }else{
                            span_report_status.removeClass('bg-success');
                            span_report_status.addClass('bg-danger');
                        }
                        span_report_status.text(updated_status);
                    },
                    success: function (resp){
                        toastSuccess(resp.message);
                    },
                    error: function (xhr){
                        let obj = JSON.parse(xhr.responseText);
                        span_report_status.text(report_status);
                        if(report_status === 'Pending'){
                            span_report_status.removeClass('bg-success');
                            span_report_status.addClass('bg-danger');
                        }else{
                            span_report_status.removeClass('bg-danger');
                            span_report_status.addClass('bg-success');
                        }
                        toastError(obj.message);
                    }
                });

            });
        });
    </script>
@endsection

