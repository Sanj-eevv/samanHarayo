@extends('layouts.auth')
@section('title', 'Email Verified')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-5 text-muted logo-small mx-auto">
                <img class="img-fluid" src="{{asset('storage/uploads/settings/logo.png')}}">
            </div>
        </div>
    </div>
<!-- end row -->
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card">

                <div class="card-body">

                    <div class="p-2">
                        <div class="text-center">

                            <div class="avatar-md mx-auto">
                                <div class="avatar-title rounded-circle bg-light">
                                    <i class="bx bx-mail-send h1 mb-0 text-primary"></i>
                                </div>
                            </div>
                            <div class="p-2 mt-4">
                                <h4>Success !</h4>
                                <p class="text-muted">Thank you, Your email has been verified. Your account is now active.</p>
                                <div class="mt-4">
                                    <a href="{{route('front.index')}}" class="btn btn-success">Back to Home</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="mt-5 text-center bold-on-hover">
                <p>© {{now()->year}}<a class="font-weight-normal text-dark" href="{{route('front.index')}}"> {{config('app.name')}}</a></p>
            </div>

        </div>
    </div>
</div>
@endsection
