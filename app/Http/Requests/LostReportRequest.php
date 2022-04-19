<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LostReportRequest extends FormRequest
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
        $reward_check = [
            Rule::requiredIf(function () use ($request) {
                if ($request->input('has_reward')) {
                    return true;
                }
                return false;
            })
        ];
        $feature_check = [
            Rule::requiredIf(function () use ($request) {
                if ($request->input('is_featured')) {
                    return true;
                }
                return false;
            })
        ];
        $max_feature_days = \config('app.settings.max_feature_days');
        return [
            'title'                     =>              ['required', 'string', 'max:191'],
            'description'               =>              ['required', 'string', 'min:10'],
            'category_id'               =>              ['required', 'exists:categories,id'],
            'brand'                     =>              ['nullable', 'string', 'max:191'],
            'contact_number'            =>              ['required', 'numeric', 'digits:10'],
            'contact_email'             =>              ['required', 'email', 'max:191'],
            'item_image'                =>              ['nullable'],
            'item_image.*'              =>              ['image', 'mimes:jpg,png,jepg', 'max:10240'],
            'address'                   =>              ['required', 'string', 'max:191'],
            'reward_amount'             =>              [$reward_check, 'numeric','nullable'],
            'duration'                  =>              [$feature_check, 'numeric', 'max:'.$max_feature_days, 'nullable'],
            'featured_image'            =>              [$feature_check, 'image', 'mimes:jpg,png,jepg', 'max:10240'],
            'latitude'                  =>              ['required', 'string', 'max:191'],
            'longitude'                  =>             ['required', 'string', 'max:191'],
        ];
    }

    protected function failedValidation(Validator $validator) {
        dd($validator->errors());
    }
}
