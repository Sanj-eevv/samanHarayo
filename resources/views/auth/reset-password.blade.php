@extends('layouts.auth')
@section('title', 'Reset Password')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary"> Reset Password</h5>
                                    <p>Reset Your Password.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{asset('assets/images/profile-img.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="p-2">
                            <form class="form-horizontal" action="{{route('password.update')}}"  method="post" novalidate="novalidate">
                                @csrf
                                <input type="hidden" name="token" value="{{ $request->token }}">
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="email" value="{{old('email', $request->email)}}" class="form-control @error('email') is-invalid @enderror sh-auth-input"
                                               placeholder="Enter email"
                                               name="email" required
                                               value="{{old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="userpassword" class="form-label">New Password</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror sh-auth-input"
                                               placeholder="Enter password"
                                               name="password"
                                               required>
                                        <button class="btn btn-light sh-eye-toggle password-addon"  tabindex ="-1" type="button"><i class="mdi mdi-eye-outline"></i></button>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror sh-auth-input"
                                               placeholder="Enter password"
                                               name="password_confirmation"
                                               required>
                                        <button class="btn btn-light sh-eye-toggle password-addon" type="button" tabindex="-1"><i class="mdi mdi-eye-outline"></i></button>
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset Password</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center bold-on-hover">
                    <p>Remember It ? <a href="{{route('login')}}" class="fw-medium text-primary"> Sign In here</a> </p>
                    <p>© {{now()->year}}-<a class="font-weight-normal text-dark" href={{route('front.index')}}>{{config('app.name')}}</a></p>
                </div>

            </div>
        </div>
    </div>
@endsection
