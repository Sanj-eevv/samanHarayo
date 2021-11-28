@extends('layouts.auth')

@section('title','Forgot Password')

@section('content')
    <div class="login-register-area" style="height: 100%;">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <div class="row w-100">
                <div class="col-lg-6 col-md-12 mx-auto">
                    <div class="login-register-wrapper">
                        <div class="login-form-container">
                            <div class="login-register-tab-list nav">
                                <a class="active" href="#">
                                    <h4>Forgot Password </h4>
                                </a>
                            </div>
                            <div class="login-register-form">
                                <form action="{{route('password.email')}}" method="post" novalidate="novalidate">
                                    @if (session('status'))
                                        <div class="alert alert-success" style="margin-bottom: 0px;" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    @csrf
                                    <label for="email"  style="margin-top:15px">Enter Your email address</label>
                                    <input value="{{old('email') }}" name="email" type="email" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                         </span>
                                    @enderror
                                    <div class="button-box mt-20">
                                        <button  style="width: 100%;" type="submit">Send Password Reset Link</button>
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

