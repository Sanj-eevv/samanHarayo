@extends('layouts.auth')
@section('title', 'Forgot Password')
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
                        <div class="alert alert-success text-center mb-4" role="alert">
                            @if (session('status'))
                                {{ session('status') }}
                            @else
                                Enter your Email and instructions will be sent to you!
                            @endif
                        </div>
                        <form class="form-horizontal" action="{{route('password.email')}}"  method="post" novalidate="novalidate">
                            @csrf
                            <div class="mb-3">
                                <label for="useremail" class="form-label">Email</label>
                                <input type="email"  value="{{old('email') }}" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Enter email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Send Reset Link</button>
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
