<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FoundReportRequest extends FormRequest
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
            'title'                     =>              ['required', 'string', 'max:191'],
            'description'               =>              ['required', 'string', 'min:100'],
            'category_id'               =>              ['required', 'exists:categories,id'],
            'brand'                     =>              ['nullable', 'string', 'max:191'],
            'contact_number'            =>              ['required', 'numeric', 'digits:10'],
            'contact_email'             =>              ['required', 'email', 'max:191'],
            'item_image'                =>              ['required'],
            'item_image.*'              =>              [ 'image', 'mimes:jpg,png,jepg', 'max:10240'],
            'address'                   =>              ['required', 'string', 'max:191'],
        ];
    }

}
