<?php

namespace App\Actions\Fortify;

use App\Helpers\SamanHarayoHelper;
use App\Models\Report;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name'            =>          ['required', 'string', 'max:191'],
            'last_name'             =>          ['required', 'string', 'max:191'],
            'email'                 =>          ['required', 'string', 'email', 'max:191', Rule::unique(User::class)],
            'password'              =>          $this->passwordRules(),
            'password_confirmation' =>          ['required']
        ])->validate();

        return User::create([
            'first_name'                =>          $input['first_name'],
            'last_name'                 =>          $input['last_name'],
            'slug'                      =>          SamanHarayoHelper::uniqueSlugify($input['first_name'], User::class, null, 'slug'),
            'email'                     =>          $input['email'],
            'password'                  =>          Hash::make($input['password']),
            'role_id'                   =>          Role::getDefaultRoleId(),
        ]);
    }
}
