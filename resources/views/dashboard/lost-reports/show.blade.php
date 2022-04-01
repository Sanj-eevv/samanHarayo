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
                            </tbody>
                        </table>
                    </div>
                    <hr>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_level_script')
    @include('dashboard.lost-reports._shared')
@endsection

