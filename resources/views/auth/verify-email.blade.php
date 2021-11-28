@extends('layouts.auth')

@section('title','Login')

@section('content')
    <div class="login-register-area" style="height: 100%;">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <div class="row w-100">
                <div class="col-lg-6 col-md-12 mx-auto">
                    <div class="login-register-wrapper">
                        <div class="login-form-container">
                            <div class="login-register-tab-list nav">
                                <a class="active" href="#">
                                    <h4> Verify Email </h4>
                                </a>
                            </div>
                            <div class="login-register-form">
                                <form action="{{route('verification.send')}}" method="post" novalidate="novalidate">
                                    @csrf
                                    @if(session('status'))
                                        <div class="alert alert-success text-center" role="alert">
                                            {{session('status')}}
                                        </div>
                                    @endif
                                    <div class="mt-10">
                                        <p class="text-center fw-bold text-muted">
                                            You must verify your email before proceeding. Please check you inbox.
                                        </p>
                                        <p class="text-center fw-bold text-muted">
                                            Haven't received a mail?
                                        </p>
                                    </div>
                                    <div class="button-box text-center mt-20">
                                        <button type="submit">Resend</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

