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
                            <a type="button" href="{{route('found-reports.show', $report->id)}}" class="btn btn-secondary waves-effect waves-light">Back</a>
                            <button onclick="confirmDelete(() => {deleteClaim({{$user->id}},{{$report->id}},true)})" id="delete-btn" class="btn btn-danger waves-effect waves-light">Delete
                                <div class="spinner-border" role="status">
                                </div>
                            </button>
                            <a type="button" href="{{route('users.show', $claim_detail->user_id)}}" class="btn btn-light waves-effect waves-light">View User</a>
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
                            <tr>
                                <th style="white-space: nowrap;" scope="row">Detail Status :</th>
                                <td class="py-0" style="vertical-align: middle">
                                    <form action="{{route('found-reports.claim.update', ['user' => $claim_detail->user_id, 'report' => $claim_detail->report_id])}}" method="POST" name="update_claim">
                                        {{ method_field('PUT') }}
                                        @csrf
                                        <div class="detail-status-container">
                                        <select class="form-select" name="detail_status" id="detail-status" disabled>
                                            @foreach (\App\Models\Report::DETAIL_STATUS as $k => $v)
                                                <?php
                                                if (old('detail_status', $claim_detail->detail_status) == $v) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                                ?>
                                                <option value="{{ $v }}" {{ $selected }}>{{ ucwords($v) }}</option>
                                            @endforeach
                                        </select>
                                        <span id="edit-detail-status" class="active">
                                            <i class="mdi mdi-pencil mdi-18px"></i>
                                        </span>
                                        <span id="update-detail-status" type="submit" onclick="update_claim.submit()" class="text-primary">
                                            <i class="fas fa-check fa-lg"></i>
                                        </span>
                                        <span id="cancel-detail-status" class="text-danger">
                                            <i class="fas fa-times fa-lg"></i>
                                        </span>
                                        </div>
                                    </form>
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
@section('page_level_script')
    @include('dashboard.found-reports.claim._shared')
    <script>
        $(document).ready(function($){
            let detail_status ="{{$claim_detail->detail_status}}";
            $('#edit-detail-status').on('click',function (){
                $('#detail-status').prop('disabled', false);
                $(this).removeClass('active');
                $('#cancel-detail-status').addClass('active');
                $('#update-detail-status').addClass('active');
            });
            $('#cancel-detail-status').on('click', function (){
                $('#detail-status').val(detail_status);
                $('#detail-status').prop('disabled', true);
                $(this).removeClass('active');
                $('#edit-detail-status').addClass('active');
                $('#update-detail-status').removeClass('active');
            });
        });
    </script>
{{--    @include('dashboard.found-reports._shared')--}}
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

