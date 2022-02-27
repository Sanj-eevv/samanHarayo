<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdentityRequest extends FormRequest
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
    public function rules()
    {
        return [
            'identity_front'                    =>              ['image', 'mimes:jpg,png,jepg'],
            'identity_back'                     =>              ['image', 'mimes:jpg,png,jepg'],
            'current_photo'                     =>              ['image', 'mimes:jpg,png,jepg'],
            'product_photo'                     =>              ['nullable'],
            'description'                       =>              ['required', 'string', 'min:100'],
        ];
    }
}
