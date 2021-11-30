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
                                        <h4> login </h4>
                                    </a>
                                    <a  href="{{route("register")}}">
                                        <h4> register </h4>
                                    </a>
                                </div>
                                <div class="login-register-form">
                                    <form action="{{route('login')}}" method="post" novalidate="novalidate">
                                        @csrf
                                        @if (session('status'))
                                            <div class="alert alert-success" style="margin-bottom: 0px; margin-top: 25px" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <label for="email">Email</label>
                                        <input value="{{old('email') }}" name="email" type="email" class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                         </span>
                                        @enderror

                                        <label for="password">Password</label>
                                        <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        </span>
                                        @enderror

                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox" name="remember">
                                                <label>Remember me</label>
                                                <a href="{{route('password.request')}}">Forgot Password?</a>
                                            </div>
                                            <button type="submit">Login</button>
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

