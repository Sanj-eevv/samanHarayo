@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">Edit Password</h4>
                        <div class="d-flex flex-wrap gap-2">
                            <a type="button" href="{{route('profile.index')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
                        </div>
                    </div>
                    <hr>
                    <form class="form" action="{{route('profile.postChangePassword')}}" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mt-4">
                                    <label class="form-label">Current Password</label>
                                    <input class="form-control @error('current_password') is-invalid @enderror" type="password" name="current_password">
                                    @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mt-4">
                                    <label class="form-label">Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mt-4">
                                    <label class="form-label">Confrim Password</label>
                                    <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-2 pt-4">
                            <a type="button" href="{{route('profile.index')}}" class="btn btn-secondary waves-effect waves-light">Cancel</a>
                            <button type="submit" class="btn btn-info waves-effect waves-light">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
