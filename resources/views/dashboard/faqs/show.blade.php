@extends('layouts.dashboard')
@section('title', 'Faq Details')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">Faq Details</h4>
                        <div class="d-flex flex-wrap gap-2">
                            <a type="button" href="{{route('faqs.index')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
                            <a type="button" href="{{route('faqs.edit', $faq->id)}}" class="btn btn-info waves-effect waves-light">Edit</a>
                            <button type="button" onclick="confirmDelete(() => {deleteFaq({{$faq->id}}, true)})" class="btn btn-light waves-effect waves-light">Delete</button>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0 table-borderless">
                            <tbody>
                            <tr>
                                <th scope="row">Question :</th>
                                <td style="white-space: pre-wrap;">{{$faq->question}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Answer :</th>
                                <td style="white-space: pre-wrap;">{{$faq->answer}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Created at :</th>
                                <td>{{\Carbon\Carbon::parse($faq->created_at)->format('Y-m-d')}}</td>
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
    @include('dashboard.faqs._shared')
@endsection

