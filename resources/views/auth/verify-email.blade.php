@extends('layouts.auth')

@section('title', 'verify-email')

@section('content')
    <div class="container">
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="text-center mb-5 text-muted">--}}
{{--                    <p class="mt-3">{{config('app.name')}}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- end row -->
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">

                    <div class="card-body">

                        <div class="p-2">
                            <div class="text-center">

                                <div class="avatar-md mx-auto">
                                    <div class="avatar-title rounded-circle bg-light">
                                        <i class="bx bxs-envelope h1 mb-0 text-primary"></i>
                                    </div>
                                </div>
                                <div class="p-2 mt-4">
                                    <h4>Verify your email</h4>
                                    @if(session('status'))
                                        <div class="alert alert-success text-center mb-4" role="alert">
                                            {{session('status')}}
                                        </div>
                                    @endif
                                    <p>We have sent you verification email <span class="fw-semibold">{{auth()->user()->email}}</span>, Please check it</p>
                                    <p>Didn't receive a mail?</p>
                                    <form action="{{route('verification.send')}}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-success w-md">Resend</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">
{{--                    <p>Didn't receive an email ? <a href="#" class="fw-medium text-primary"> Resend </a> </p>--}}
                    <p>© <script>document.write(new Date().getFullYear())</script>-<a class="font-weight-normal text-dark" href={{route('front.index')}}>{{config('app.name')}}</a></p>
                </div>

            </div>
        </div>
    </div>

@endsection
