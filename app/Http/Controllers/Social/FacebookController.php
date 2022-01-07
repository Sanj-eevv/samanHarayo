<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Http\Responses\LoginResponse;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
            $response = Socialite::driver('facebook')->fields([
                'first_name',
                'last_name',
                'email',
            ])->user();
            // the default role is "basic user"
            $defaultRole = Role::getDefaultRoleId();
            // search user by email.
            // if found any user, return the user otherwise create a new user.
            $user = User::firstOrCreate(
                [   'email'                 =>      $response->email],
                [
                    'first_name'        => $response->user['first_name'],
                    'last_name'         => $response->user['last_name'],
                    'email'             => $response->email,
                    'email_verified_at' => now(),
                    'role_id'           => $defaultRole,
                    'fb_id'             => $response->id,
                    'password'          => encrypt(Str::random(8))
                ]
            );
            // if user is already present, update user's facebook id if not any.
            if($user){
                $fb_id = $user->fb_id;
                if(!$fb_id) {
                    $user->fb_id = $response->id;
                    $user->save();
                }
            }
            // authenticate user based on role
            Auth::login($user);
            $home = auth()->user()->isAdmin() ? '/dashboard' : '/';
            return redirect()->intended($home.'#');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
