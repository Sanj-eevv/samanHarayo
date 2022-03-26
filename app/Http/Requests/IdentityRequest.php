<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

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
    public function rules(Request $request)
    {
        return [
            'identity_front'                        =>              ['required', 'image', 'mimes:jpg,png,jepg', 'max:10240'],
            'identity_back'                         =>              ['required', 'image', 'mimes:jpg,png,jepg', 'max:10240'],
            'current_image'                         =>              ['required', 'image', 'mimes:jpg,png,jepg', 'max:10240'],
            'item_image'                            =>              ['nullable'],
            'item_image.*'                          =>              [ 'image', 'mimes:jpg,png,jepg', 'max:10240'],
            'description'                           =>              ['required', 'string', 'min:100'],
        ];
    }
}
