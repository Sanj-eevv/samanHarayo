<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReportRequest extends FormRequest
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
        $reward_amount = [
            Rule::requiredIf(function () use ($request) {
                if ($request->rewardCheckBox) {
                    return true;
                }
                return false;
            })
        ];
        $feature_check = [
            Rule::requiredIf(function () use ($request) {
                if ($request->featureCheckBox) {
                    return true;
                }
                return false;
            })
        ];
        return [
            'name'                      =>          ['required', 'string', 'max:191'],
            'description'               =>          ['required', 'string', 'max:191'],
            'category'                  =>          ['required', 'exists:categories,id'],
            'brand'                     =>          ['nullable', 'string', 'max:191'],
            'phone'                     =>          ['required', 'numeric', 'digits:10'],
            'email'                     =>          ['required', 'email'],
            'product_photo'             =>          ['nullable'],
            'product_photo.*'           =>          [ 'image', 'mimes:jpg,png,jepg'],
            'address'                   =>          ['required', 'string', 'max:191'],
            'reward_amount'             =>          [$reward_amount, 'numeric','nullable'],
            'feature_report_duration'   =>          [$feature_check, 'numeric', 'max:30', 'nullable'],
            'featured_image'            =>          [$feature_check, 'image', 'mimes:jpg,png,jepg'],
        ];
    }
}
