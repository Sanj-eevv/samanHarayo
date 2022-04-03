@extends('layouts.dashboard')
@section('title', 'User Details')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">Role Details</h4>
                        <div class="d-flex flex-wrap gap-2">
                            <a type="button" href="{{route('roles.index')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
                            <a type="button" href="{{route('roles.edit', $role->id)}}" class="btn btn-info waves-effect waves-light">Edit</a>
                            @if($role->preserved === 'no')
                            <button type="button" onclick="confirmDelete(() => {deleteRole({{$role->id}}, true)})" class="btn btn-light waves-effect waves-light">Delete</button>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0 table-borderless">
                            <tbody>
                            <tr>
                                <th scope="row">Name :</th>
                                <td>{{$role->label}}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="white-space: pre-wrap">Description :</th>
                                <td>{{$role->description}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Created at :</th>
                                <td>{{\Carbon\Carbon::parse($role->created_at)->format('Y-m-d')}}</td>
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
                        <h4 class="card-title mb-0">Permission</h4>
                    </div>
                    <hr>
                    <?php $i = 0; ?>
                    @foreach($permissions as $pk => $pv)
                        <div class="col-lg-12">
                            <div class="individual-permission">
                                <div class="card-title">
                                    <strong>{{$pk}}</strong>
                                </div>
                                <div class="card-body pb-0 px-0 rounded">
                                    <div class="row">
                                        @foreach($pv as $pvk => $pvv)
{{--                                            {{ (count($pv) === 1)?'':'mx-auto' }}--}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="d-flex align-items-center gap-2 form-check px-0">
                                                        <input name="permissions[]" type="checkbox" value="{{$pvv['id']}}" id="{{$pvv['name']}}" {{(in_array($pvv['id'],$role_permission))?'checked':''}} disabled />
                                                        <label class="form-check-label" for="{{$pvv['name']}}">
                                                            {{$pvv['label']}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_level_script')
    @include('dashboard.roles._shared')
@endsection

