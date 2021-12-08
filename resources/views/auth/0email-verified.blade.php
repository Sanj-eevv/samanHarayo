@extends('layouts.auth')

@section('title','Email Verified')

@section('content')
    <div class="login-register-area" style="height: 100%;">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <div class="row w-100">
                <div class="col-lg-6 col-md-12 mx-auto">
                    <div class="login-register-wrapper">
                        <div class="login-form-container">
                            <div class="login-register-tab-list nav">
                                <a class="active" href="#">
                                    <h4> Email Verified</h4>
                                </a>
                            </div>
                            <div class="login-register-form">
                                <form action="{{route('front.index')}}" method="get" novalidate="novalidate">
                                    @csrf
                                    <div class="mt-10">
                                        <p class="text-center fw-bold text-muted">
                                            Thank you, Your email has been verified. Your account is now active.

                                        </p>
                                        <p class="text-center fw-bold text-muted">
                                            Please, click the button below to continue.
                                        </p>
                                    </div>
                                    <div class="button-box text-center mt-20">
                                        <button type="submit">Continue</button>
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

