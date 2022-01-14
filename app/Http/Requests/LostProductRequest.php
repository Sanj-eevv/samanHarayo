<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LostProductRequest extends FormRequest
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
            'name'                  =>          ['required', 'string', 'max:191'],
            'description'           =>          ['required', 'string', 'max:191'],
            'category'              =>          ['required', 'exists:categories,id'],
            'brand'                 =>          ['nullable', 'string', 'max:191'],
            'phone'                 =>          ['required', 'numeric', 'digits:10'],
            'email'                 =>          ['required', 'email'],
            'product_photo'         =>          ['nullable'],
            'product_photo.*'       =>          [ 'image', 'mimes:jpg,png,jepg'],
            'address'               =>          ['required', 'string', 'max:191']
        ];
    }
}
