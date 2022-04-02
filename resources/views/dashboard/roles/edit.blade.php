@extends('layouts.dashboard')
@section('title', 'Edit Role')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">Edit Role</h4>
                        <div class="d-flex flex-wrap gap-2">
                            <a type="button" href="{{route('roles.index')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
                        </div>
                    </div>
                    <hr>
                    <form class="form" action="{{route('roles.update', $role)}}" method="POST">
                        {{ method_field('PUT') }}
                        @csrf
                        @include('dashboard.roles._form',['buttonText' => 'Update'])
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
@section('page_level_script')
    @include('dashboard.roles._shared')
@endsection
