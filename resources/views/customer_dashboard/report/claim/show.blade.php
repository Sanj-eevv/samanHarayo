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
                                <td class="py-0" style="vertical-align: middle">
                                    @if($claim_detail->report_status === \App\Models\Report::REPORT_STATUS[0])
                                    <form action="{{route('customerDashboard.report.claim.verify', ['user' => $user->slug, 'report' => $report->slug])}}" method="POST" name="update_claim">
                                        {{ method_field('PUT') }}
                                        @csrf
                                        <div class="detail-status-container">
                                            <select class="form-select" name="report_status" id="report-status" style="width: 100px;" disabled>
                                                @foreach (\App\Models\Report::DETAIL_STATUS as $k => $v)
                                                    <?php
                                                    if (old('report_status', $claim_detail->report_status) == $v) {
                                                        $selected = 'selected';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                    ?>
                                                    <option value="{{ $v }}" {{ $selected }}>{{ ucwords($v) }}</option>
                                                @endforeach
                                            </select>
                                            <span id="edit-report-status" class="active">
                                            <i class="mdi mdi-pencil mdi-18px"></i>
                                        </span>
                                            <span id="update-report-status" type="submit" onclick="update_claim.submit()" class="text-primary">
                                            <i class="fas fa-check fa-lg"></i>
                                        </span>
                                            <span id="cancel-report-status" class="text-danger">
                                            <i class="fas fa-times fa-lg"></i>
                                        </span>
                                        </div>
                                    </form>
                                    @else
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
                                    @endif
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
    <script>
        $(document).ready(function($){
            let detail_status ="{{$claim_detail->report_status}}";
            $('#edit-report-status').on('click',function (){
                $('#report-status').prop('disabled', false);
                $(this).removeClass('active');
                $('#cancel-report-status').addClass('active');
                $('#update-report-status').addClass('active');
            });
            $('#cancel-report-status').on('click', function (){
                $('#report-status').val(detail_status);
                $('#report-status').prop('disabled', true);
                $(this).removeClass('active');
                $('#edit-report-status').addClass('active');
                $('#update-report-status').removeClass('active');
            });
        });
    </script>
@endsection

