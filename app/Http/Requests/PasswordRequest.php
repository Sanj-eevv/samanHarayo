<?php

namespace App\Http\Requests;

use App\Rules\CurrentPasswordValidator;
use Illuminate\Foundation\Http\FormRequest;
use Laravel\Fortify\Rules\Password;

class PasswordRequest extends FormRequest
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
            'current_password'          => [ 'required' ,'string', new CurrentPasswordValidator()],
            'password'                  => ['required', 'string', new password, 'confirmed']
        ];
    }
}
