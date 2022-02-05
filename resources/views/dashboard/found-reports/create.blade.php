@extends('layouts.dashboard')
@section('title', 'Add user')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">Add user</h4>
                        <div class="d-flex flex-wrap gap-2">
                            <a type="button" href="{{route('users.index')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
                        </div>
                    </div>
                    <hr>
                    <form class="form" action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('dashboard.users._form',['show' => true, 'buttonText' => 'Create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
