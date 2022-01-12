@extends('layouts.dashboard')
@section('title', 'User Details')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">Add user</h4>
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
                                <th scope="row">Created at :</th>
                                <td>{{\Carbon\Carbon::parse($user->created_at)->format('Y-m-d')}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Image: </th>
                                @php
                                    $img_src = asset('assets/media/avatars/blank.png');
                                    if ($user->avatar) {
                                        $img_src = asset('storage/uploads/profiles/' . $user->avatar);
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
@endsection
@section('page_level_script')
    @include('dashboard.users._shared')
@endsection

