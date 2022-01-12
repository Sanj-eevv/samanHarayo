<div>
    <div class="row">
        <div class="col-lg-12">
            <div>
                <label class="form-label">First Name</label>
                <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}">
                @error('first_name')
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
                <label class="form-label">Last Name</label>
                <input class="form-control @error('last_name') is-invalid @enderror" type="text" value="{{old('last_name', $user->last_name)}}" name="last_name">
                @error('last_name')
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
                <label class="form-label">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{old('email', $user->email)}}">
                @error('email')
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
                <label class="form-label">Select Role</label>
                <select class="form-select @error('role_id') is-invalid @enderror" name="role_id" value="{{old('role_id', $user->role_id)}}">
                    <option value="">{{ __('-- Select Role --') }}</option>
                    @foreach ($roles as $k => $v)
                        <?php
                        if (old('role_id', $user->role_id) == $k) {
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        }
                        ?>
                        <option value="{{ $k }}" {{ $selected }}>{{ ucwords($v) }}</option>
                    @endforeach
                </select>
                @error('role_id')
                <span class="invalid-feedback" role="alert">
                {{ $message }}
                </span>
                @enderror
            </div>
        </div>
    </div>
@if($show)
    <div class="row">
        <div class="col-lg-12">
            <div class="mt-4">
                <label class="form-label">Password</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password">
                @error('password')
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
                <label class="form-label">Confrim Password</label>
                <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation">
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                {{ $message }}
                </span>
                @enderror
            </div>
        </div>
    </div>
    @endif
</div>
<div class="d-flex flex-wrap gap-2 pt-4">
    <a type="button" href="{{route('users.index')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
    <button type="submit" class="btn btn-info waves-effect waves-light">{{$buttonText}}</button>
</div>
