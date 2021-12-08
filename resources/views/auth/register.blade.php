@extends('layouts.auth')
@section('title', 'Register: samanHarayo')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card overflow-hidden">
            <div class="bg-primary bg-soft">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-4">
                            <h5 class="text-primary">Register</h5>
                            <p>Get your {{config('app.name')}} account now.</p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="{{asset("assets/images/profile-img.png")}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0 mt-3">
                <div class="p-2">
                    <form class="needs-validation"  action="{{route('register')}}" method="post" novalidate="novalidate">
                        @csrf
                        <div class="mb-4">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror sh-auth-input" id="first_name"
                                   placeholder="Enter first name"
                                   name="first_name" required
                                   value="{{old('first_name')}}">
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror sh-auth-input" id="last_name"
                                   placeholder="Enter last Name"
                                   name="last_name" required
                                   value="{{old('last_name') }}">
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror sh-auth-input" id="useremail"
                                   placeholder="Enter email"
                                   name="email" required
                                   value="{{old('email') }}>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="userpassword" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror sh-auth-input" id="userpassword" placeholder="Enter password" name="password" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror sh-auth-input"  placeholder="Enter password" name="password_confirmation" required>
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="mt-4 d-grid">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                        </div>

                        <div class="mt-4 text-center">
                            <h5 class="font-size-14 mb-3">Sign up using</h5>

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
                            <p class="mb-0">By registering you agree to the {{config('app.name')}} <a href="#" class="text-primary">Terms of Use</a></p>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="mt-5 text-center">

            <div>
                <p>Already have an account ? <a href="{{route('login')}}" class="fw-medium text-primary"> Login</a> </p>
                <p>© <script>document.write(new Date().getFullYear())</script>-<a class="font-weight-normal text-dark" href="{{route('front.index')}}">{{config('app.name')}}</a></p>
            </div>
        </div>

    </div>
</div>
@endsection
