<div>
    <div class="row   @if(in_array($role->name, \App\Models\Role::ADMIN_ROLE)) d-none @endif">
        <div class="col-lg-12">
            <div>
                <label class="form-label">{{ __('Name') }}</label>
                <input class="form-control @error('label') is-invalid @enderror" type="text"
                       name="label" value="{{ old('label', $role->label) }}">
                @error('label')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="mt-4">
                <label class="form-label">{{__('Description')}}</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description', $role->description) }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
    </div>
</div>
@if(!in_array($role->name,\App\Models\Role::ADMIN_ROLE))
<div class="row mt-4">
    <div class="col-lg-12">
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
                                                    <input name="permissions[]" type="checkbox" value="{{$pvv['id']}}" id="{{$pvv['name']}}" {{(in_array($pvv['id'],$role_permission))?'checked':''}} />
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
@endif
<div class="d-flex flex-wrap gap-2 pt-4">
    <a type="button" href="{{route('roles.index')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
    <button type="submit" class="btn btn-info waves-effect waves-light">{{$buttonText}}</button>
</div>
