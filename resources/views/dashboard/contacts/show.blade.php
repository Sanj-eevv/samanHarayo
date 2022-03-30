@extends('layouts.dashboard')
@section('title', 'Contact Details')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">Contact Details</h4>s
                        <div class="d-flex flex-wrap gap-2">
                            <a type="button" href="{{route('contacts.index')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
                            <button type="button" onclick="confirmDelete(() => {deleteContact({{$contact->id}}, true)})" class="btn btn-light waves-effect waves-light">Delete</button>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0 table-borderless">
                            <tbody>
                            <tr>
                                <th scope="row">Name :</th>
                                <td>{{$contact->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email :</th>
                                <td>{{$contact->email}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Message :</th>
                                <td style="white-space: pre-wrap;">{{$contact->message}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Question :</th>
                                <td style="white-space: pre-wrap;">{{$contact->question ?? 'Question not available'}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Created at :</th>
                                <td>{{\Carbon\Carbon::parse($contact->created_at)->format('Y-m-d')}}</td>
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
    @include('dashboard.contacts._shared')
@endsection

