@extends('layouts.auth')

@section('title','Login: samanHarayo')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>Sign in to continue to {{config('app.name')}}.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{asset("assets/images/auth-images/profile-img.png")}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 mt-3">
                        <div class="p-2">
                            <form class="form-horizontal" action="{{route('login')}}"  method="post" novalidate="novalidate">
                                @csrf
                                @if (session('status'))
                                    <div class="alert alert-success" style="margin-bottom: 0px; margin-top: 25px" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="sh-auth-input form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                         </span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Password</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password"  class="form-control  @error('password') is-invalid @enderror sh-auth-input" name="password" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                        <button class="btn btn-light sh-eye-toggle" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-check" name="remember">
                                    <label class="form-check-label" for="remember-check">
                                        Remember me
                                    </label>
                                </div>

                                <div class="mt-3 d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                </div>

                                <div class="mt-4 text-center">
                                    <h5 class="font-size-14 mb-3">Sign in with</h5>

                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="javascript::void()" class="social-list-item bg-primary text-white border-primary">
                                                <i class="mdi mdi-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript::void()" class="social-list-item bg-info text-white border-info">
                                                <i class="mdi mdi-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript::void()" class="social-list-item bg-danger text-white border-danger">
                                                <i class="mdi mdi-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="mt-4 text-center">
                                    <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">

                    <div>
                        <p>Don't have an account ? <a href="{{route('register')}}" class="fw-medium text-primary"> Signup now </a> </p>
                        <p>© <script>document.write(new Date().getFullYear())</script>-<a class="font-weight-normal text-dark" href="{{route('front.index')}}"> {{config('app.name')}} </a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
