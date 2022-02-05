@extends('layouts.dashboard')
@section('title', 'Add user')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">Edit user</h4>
                        <div class="d-flex flex-wrap gap-2">
                            <a type="button" href="{{route('users.index')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
                        </div>
                    </div>
                    <hr>
                    <form class="form" action="{{route('users.update', $user)}}" method="POST" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @csrf
                        @include('dashboard.users._form',['show' => false, 'buttonText' => 'Update'])
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
