<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $test_required = [
            Rule::requiredIf(function () use ($request) {
                if ($request->app_environment === 'test') {
                    return true;
                }
                return false;
            })
        ];

        $live_required = [
            Rule::requiredIf(function () use ($request) {
                if ($request->app_environment === 'live') {
                    return true;
                }
                return false;
            })
        ];
        return [
            'app_name'                          => ['required', 'string', 'max:191',],
            'admin_email'                       => ['required', 'email',],
            'company_address'                   => ['required', 'string', 'max:191'],
            'contact_email'                     => ['required', 'string', 'max:191'],
            'contact_phone'                     => ['required', 'string', 'max:191'],
            'app_environment'                   => ['in:test,live'],
            'per_feature_price'                 => ['required', 'string', 'max:191'],
            'max_feature_days'                  => ['required', 'string', 'max:191'],
            'per_report_price'                  => ['required', 'string', 'max:191'],
            'app_logo'                          => ['required_without:logo_hidden_value', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
            'stripe_test_publishable_key'       => ['nullable', $test_required, 'max:191', 'starts_with:pk_test_', 'string'],
            'stripe_test_secret_key'            => ['nullable', $test_required, 'max:191', 'starts_with:sk_test_', 'string'],
            'stripe_live_publishable_key'       => ['nullable', $live_required, 'max:191', 'starts_with:pk_live_', 'string'],
            'stripe_live_secret_key'            => ['nullable', $live_required, 'max:191', 'starts_with:sk_live_', 'string'],
            'paypal_test_client_id'             => ['nullable', $test_required, 'max:191', 'string'],
            'paypal_test_secret_key'            => ['nullable', $test_required, 'max:191', 'string'],
            'paypal_live_client_id'             => ['nullable', $live_required, 'max:191', 'string'],
            'paypal_live_secret_key'            => ['nullable', $live_required, 'max:191', 'string'],
        ];
    }
    public function messages()
    {
        return [
            'app_logo.required_without' => 'The logo field is required',
        ];
    }
}
