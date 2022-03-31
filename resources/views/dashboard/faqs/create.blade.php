@extends('layouts.dashboard')
@section('title', 'Add Faq')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">Add Faq</h4>
                        <div class="d-flex flex-wrap gap-2">
                            <a type="button" href="{{route('faqs.index')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
                        </div>
                    </div>
                    <hr>
                    <form class="form" action="{{route('faqs.store')}}" method="POST">
                        @csrf
                        @include('dashboard.faqs._form',['buttonText' => 'Create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
