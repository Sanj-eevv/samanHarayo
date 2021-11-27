@extends('layouts.front')

@section('title','Register')

@section('content')
    <div class="login-register-area pt-25 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 ms-auto me-auto">
                    <div class="login-register-wrapper">
                        <div class="login-form-container">
                            <div class="login-register-tab-list nav">
                                <a  href="{{route('login')}}">
                                    <h4> login </h4>
                                </a>
                                <a class="active" href="#">
                                    <h4> register </h4>
                                </a>
                            </div>
                            <div class="login-register-form">
                                <form action="{{route('register')}}" method="post" novalidate="novalidate" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <label for="first_name">First Name</label>
                                            <input value="{{old('first_name') }}" type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror">
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <label  for="first_name">Last Name</label>
                                            <input value="{{old('last_name') }}" type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror">
                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <label for="email">Email</label>
                                    <input value="{{old('email') }}" name="email" type="email" class="form-control @error('email') is-invalid @enderror">
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

                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                       {{ $message }}
                                    </span>
                                    @enderror
                                    <div class="button-box">
                                        <button class="register-btn" type="submit">Register</button>
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

@section('page_level_script')
<script type="text/javascript">
    $( window ).on('load', function() {
        $('#Password').passtrength({
            minChars: 8,
            passwordToggle:false,
        });
    });
</script>
@endsection

