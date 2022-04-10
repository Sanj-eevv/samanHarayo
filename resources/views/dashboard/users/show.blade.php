@extends('layouts.dashboard')
@section('title', 'User Details')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">User Details</h4>
                        <div class="d-flex flex-wrap gap-2">
                            <a type="button" href="{{route('users.index')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
                            <a type="button" href="{{route('users.edit', $user->id)}}" class="btn btn-info waves-effect waves-light">Edit</a>
                            <button type="button" onclick="confirmDelete(() => {deleteUser({{$user->id}}, true)})" class="btn btn-light waves-effect waves-light">Delete</button>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0 table-borderless">
                            <tbody>
                            <tr>
                                <th scope="row">Full Name :</th>
                                <td>{{$user->first_name. ' '. $user->last_name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email :</th>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Role :</th>
                                <td>{{$user->role->label}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Balance :</th>
                                <td>${{$user->balance}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Created at :</th>
                                <td>{{\Carbon\Carbon::parse($user->created_at)->format('Y-m-d')}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Image: </th>
                                @php
                                    $img_src = asset('assets/images/common/blank_user.png');
                                    if ($user->avatar) {
                                        $img_src = asset('storage/uploads/users/' . $user->id.'/'.$user->avatar);
                                    }
                                @endphp
                                <td>
                                    <img class="rounded avatar-md" src="{{$img_src}}" data-holder-rendered="true">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div  class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">User Detail</h4>
                    </div>
                    <hr>
                    <h5 class="pb-2">User Identity</h5>
                    <div class="identity_container pb-4">
                        <div>
                            @php
                                $img_src = asset('assets/images/common/placeholder.jpg');
                                if ($user->identity_front) {
                                    $img_src = asset('storage/uploads/users/' . $user->id.'/'.$user->identity_front);
                                }
                            @endphp
                            <a href="{{$img_src}}">
                                <img class="img-fluid identity-img cover-img image-popup" src="{{$img_src}}" alt="">
                            </a>
                        </div>
                        <div>
                            @php
                                $img_src = asset('assets/images/common/placeholder.jpg');
                                if ($user->identity_back) {
                                    $img_src = asset('storage/uploads/users/' . $user->id.'/'.$user->identity_back);
                                }
                            @endphp
                            <a href="{{$img_src}}">
                            <img class="img-fluid identity-img cover-img image-popup" src="{{$img_src}}" alt="">
                            </a>
                        </div>
                    </div>
                    <h5 class="pb-2">User Image</h5>
                    <div class="identity_container">
                        @php
                            $img_src = asset('assets/images/common/blank_user.png');
                            if ($user->current_image) {
                                $img_src = asset('storage/uploads/users/' . $user->id.'/'.$user->current_image);
                            }
                        @endphp
                        <a href="{{$img_src}}">
                        <img class="img-fluid identity-img cover-img image-popup" src="{{$img_src}}" alt="">
                        </a>
                    </div>
                    <div class="table-responsive">
{{--                        <table class="table table-nowrap mb-0 table-borderless">--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <th scope="row">Identity Front :</th>--}}
{{--                                <td>--}}
{{--                                    @php--}}
{{--                                        $img_src = asset('assets/images/common/placeholder.jpg');--}}
{{--                                        if ($user->identity_front) {--}}
{{--                                            $img_src = asset('storage/uploads/users/' . $user->id.'/'.$user->identity_front);--}}
{{--                                        }--}}
{{--                                    @endphp--}}
{{--                                    <img class="img-fluid identity-img cover-img" src="{{$img_src}}" alt="">--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <th scope="row">Identity Back :</th>--}}
{{--                                <td>--}}
{{--                                    @php--}}
{{--                                        $img_src = asset('assets/images/common/placeholder.jpg');--}}
{{--                                        if ($user->identity_back) {--}}
{{--                                            $img_src = asset('storage/uploads/users/' . $user->id.'/'.$user->identity_back);--}}
{{--                                        }--}}
{{--                                    @endphp--}}
{{--                                    <img class="img-fluid identity-img cover-img" src="{{$img_src}}" alt="">--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <th scope="row">Current Image :</th>--}}
{{--                                <td>--}}
{{--                                    @php--}}
{{--                                        $img_src = asset('assets/images/common/blank_user.png');--}}
{{--                                        if ($user->current_image) {--}}
{{--                                            $img_src = asset('storage/uploads/users/' . $user->id.'/'.$user->current_image);--}}
{{--                                        }--}}
{{--                                    @endphp--}}
{{--                                    <img class="img-fluid placeholder-img cover-img" src="{{$img_src}}" alt="">--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_level_script')
    @include('dashboard.users._shared')
@endsection

