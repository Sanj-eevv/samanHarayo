<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\UserDetail;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
        $user = Auth::user();
        $identity = [
            Rule::requiredIf(function () use ($user) {
                    if ($user->verified === User::VERIFIED) {
                        return false;
                    }
                return true;
            })
        ];
        $current_image = [
            Rule::requiredIf(function () use($user){
                /*TODO: This submonths needed to be retrieve from settings table */
                if ($user->updated_at < Carbon::now()->subMonths(3) || !($user->current_image)) {
                    return true;
                }
                return false;
            })
        ];
        return [
            'identity_front'                        =>              [$identity, 'image', 'mimes:jpg,png,jepg', 'max:10240'],
            'identity_back'                         =>              [$identity, 'image', 'mimes:jpg,png,jepg', 'max:10240'],
            'current_image'                         =>              [$current_image, 'image', 'mimes:jpg,png,jepg', 'max:10240'],
            'item_image'                            =>              ['nullable'],
            'item_image.*'                          =>              [ 'image', 'mimes:jpg,png,jepg', 'max:10240'],
            'description'                           =>              ['required', 'string', 'min:100'],
        ];
    }
}
