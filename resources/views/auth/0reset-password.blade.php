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
                                    <h4> Reset Password </h4>
                                </a>
                            </div>
                            <div class="login-register-form">
                                <form action="{{route('password.update')}}" method="post" novalidate="novalidate">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $request->token }}">
                                    <label for="email">Email</label>
                                    <input value="{{ $request->email ?? old('email') }}" name="email" type="email" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                         </span>
                                    @enderror

                                    <label for="password">Password</label>
                                    <input type="password" id="Password" name="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        </span>
                                    @enderror

                                    <label for="password">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        </span>
                                    @enderror

                                    <div class="button-box mt-20">
                                        <button type="submit">Reset Password</button>
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

