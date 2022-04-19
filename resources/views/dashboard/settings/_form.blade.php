
    <?php
    $all_settings = [];
    $keys_arr = $settings->pluck('key_name');
    foreach($keys_arr as $k => $v){
        $row = $settings->where('key_name',$v)->first();
        if(empty($row)){
            $all_settings[$v] = null;
        }else{
            $all_settings[$v] = $row->key_value;
        }
    }
    ?>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <label class="form-label">App Name</label>
                    <input class="form-control @error('app_name') is-invalid @enderror" type="text" name="app_name" value="{{ old('app_name', $all_settings['app_name']) }}">
                    @error('app_name')
                    <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <label class="form-label mt-4">Admin Email</label>
                    <input class="form-control @error('admin_email') is-invalid @enderror" type="email" name="admin_email" value="{{ old('admin_email', $all_settings['admin_email']) }}">
                    @error('admin_email')
                    <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <label class="form-label mt-4">Company Address</label>
                    <input class="form-control @error('company_address') is-invalid @enderror" type="text" name="company_address" value="{{ old('company_address', $all_settings['company_address']) }}">
                    @error('company_address')
                    <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <label class="form-label mt-4">Contact Phone</label>
                    <input class="form-control @error('contact_phone') is-invalid @enderror" type="text" name="contact_phone" value="{{ old('contact_phone', $all_settings['contact_phone']) }}">
                    @error('contact_phone')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <label class="form-label mt-4">Contact Email</label>
                    <input class="form-control @error('contact_email') is-invalid @enderror" type="text" name="contact_email" value="{{ old('contact_email', $all_settings['contact_email']) }}">
                    @error('contact_email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <label class="form-label mt-4">Per Report Price</label>
                    <input class="form-control @error('per_report_price') is-invalid @enderror" type="text" name="per_report_price" value="{{ old('per_report_price', $all_settings['per_report_price']) }}">
                    @error('per_report_price')
                    <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <label class="form-label mt-4">Per Feature Price</label>
                    <input class="form-control @error('per_feature_price') is-invalid @enderror" type="text" name="per_feature_price" value="{{ old('per_feature_price', $all_settings['per_feature_price']) }}">
                    @error('per_feature_price')
                    <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <label class="form-label mt-4">Max Feature Days</label>
                    <input class="form-control @error('max_feature_days') is-invalid @enderror" type="text" name="max_feature_days" value="{{ old('max_feature_days', $all_settings['max_feature_days']) }}">
                    @error('max_feature_days')
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
                    <label class="form-label">Select App Environment</label>
                    <select class="form-select @error('app_environment') is-invalid @enderror" name="app_environment">
                        <option value="">{{ __('-- Select Environment --') }}</option>
                        @foreach($app_environments as $app_environment)
                            <?php
                            if( old('app_environment', $all_settings['app_environment']) == $app_environment ? 'selected' : '' ){
                                $selected = "selected";
                            }else{
                                $selected = '';
                            }
                            ?>
                                <option value="{{$app_environment}}" {{ $selected }}>{{ ucwords($app_environment) }}</option>
                        @endforeach
                    </select>
                    @error('app_environment')
                    <span class="invalid-feedback" role="alert">
                    {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <label class="form-label mt-4">Stripe Test Publishable Key</label>
                    <input class="form-control @error('stripe_test_publishable_key') is-invalid @enderror" type="text" name="stripe_test_publishable_key" value="{{ old('stripe_test_publishable_key', $all_settings['stripe_test_publishable_key']) }}">
                    @error('stripe_test_publishable_key')
                    <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <label class="form-label mt-4">Stripe Test Secret Key</label>
                    <input class="form-control @error('stripe_test_secret_key') is-invalid @enderror" type="text" name="stripe_test_secret_key" value="{{ old('stripe_test_secret_key', $all_settings['stripe_test_secret_key']) }}">
                    @error('stripe_test_secret_key')
                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <label class="form-label mt-4">Stripe Live Publishable Key</label>
                    <input class="form-control @error('stripe_live_publishable_key') is-invalid @enderror" type="text" name="stripe_live_publishable_key" value="{{ old('stripe_live_publishable_key', $all_settings['stripe_live_publishable_key']) }}">
                    @error('stripe_live_publishable_key')
                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <label class="form-label mt-4">Stripe Live Test Key</label>
                    <input class="form-control @error('stripe_live_secret_key') is-invalid @enderror" type="text" name="stripe_live_secret_key" value="{{ old('stripe_live_secret_key', $all_settings['stripe_live_secret_key']) }}">
                    @error('stripe_live_secret_key')
                    <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <label class="form-label mt-4">Paypal Test Client Id</label>
                    <input class="form-control @error('paypal_test_client_id') is-invalid @enderror" type="text" name="paypal_test_client_id" value="{{ old('paypal_test_client_id', $all_settings['paypal_test_client_id']) }}">
                    @error('paypal_test_client_id')
                    <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                            </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <label class="form-label mt-4">Paypal Test Secret Key</label>
                    <input class="form-control @error('paypal_test_secret_key') is-invalid @enderror" type="text" name="paypal_test_secret_key" value="{{ old('paypal_test_secret_key', $all_settings['paypal_test_secret_key']) }}">
                    @error('paypal_test_secret_key')
                    <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <label class="form-label mt-4">Paypal Live Client Id</label>
                    <input class="form-control @error('paypal_live_client_id') is-invalid @enderror" type="text" name="paypal_live_client_id" value="{{ old('paypal_live_client_id', $all_settings['paypal_live_client_id']) }}">
                    @error('paypal_live_client_id')
                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <label class="form-label mt-4">Paypal Live Secret Key</label>
                    <input class="form-control @error('paypal_live_secret_key') is-invalid @enderror" type="text" name="paypal_live_secret_key" value="{{ old('paypal_live_secret_key', $all_settings['paypal_live_secret_key']) }}">
                    @error('paypal_live_secret_key')
                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <label class="form-label mt-4">App Logo</label>
                    <input type="hidden" name="logo_hidden_value" value="{{old('app_logo',$all_settings['app_logo'])}}"/>
                    <input class="form-control @error('app_logo') is-invalid @enderror" type="file" name="app_logo" accept=".png, .jpg, .jpeg" onchange="loadImage(this)" id="img-input" value="{{ old('app_logo', $all_settings['app_logo']) }}" />
                    @error('app_logo')
                        <span style="width: 100%;margin-top: 0.25rem;font-size: 80%;color: #f46a6a;" role="alert">
                            {{$message}}
                        </span>
                    @enderror
                    <div class="sh_preview_image_container  {{(empty($all_settings['app_logo']))?'d-none':''}}">
                        <img id="sh_preview_img" src="{{(empty($all_settings['app_logo']))?'':asset('storage/uploads/settings/'.$all_settings['app_logo'])}}"
                             class="img-fluid "/>
                        <a href="!#" class="sh_preview_image_close"><i class="fas fa-times"></i></a>
                    </div>
                </div>
            </div>
        </div>
    <div class="d-flex flex-wrap gap-2 pt-4">
        <a type="button" href="{{route('dashboard.index')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
        <button type="submit" class="btn btn-info waves-effect waves-light">{{$buttonText}}</button>
    </div>
    @section('page_level_script')
    <script>
        $(document).ready(function (){
            $('.sh_preview_image_close').click(function (e) {
                e.preventDefault();
                let parent_container = $(this).parent('.sh_preview_image_container');
                parent_container.addClass('d-none');
                parent_container.siblings("input[type='file']").val('');
                parent_container.siblings("input[type='hidden']").val('');
            });

        });
    </script>
    @endsection
