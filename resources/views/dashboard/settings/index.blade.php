@extends('layouts.dashboard')
@section('title', 'Settings')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">Update Settings</h4>
                        <div class="d-flex flex-wrap gap-2">
                            <a type="button" href="{{route('dashboard.index')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
                        </div>
                    </div>
                    <hr>
                    <form class="form" action="{{route('settings.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('dashboard.settings._form',['buttonText' => 'Update'])
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
