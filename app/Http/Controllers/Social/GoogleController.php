<?php

namespace App\Http\Controllers\Social;

use App\Helpers\SamanHarayoHelper;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->with(["prompt" => "select_account"])->redirect();
    }

    public function loginWithGoogle(){
        try{
            $response = Socialite::driver('google')->user();
            // the default role is "basic user"
            $defaultRole = Role::getDefaultRoleId();
            // search user by email.
            // if found any user, return the user otherwise create a new user.
            $user = User::firstOrCreate(
                [
                    'email'                 =>      $response->email
                ],
                [
                    'first_name'                    => $response->user['given_name'],
                    'last_name'                     => $response->user['family_name'],
                    'slug'                          => SamanHarayoHelper::uniqueSlugify($response->user['given_name'], User::class, null, 'slug'),
                    'email'                         => $response->email,
                    'email_verified_at'             => now(),
                    'role_id'                       => $defaultRole,
                    'google_id'                     => $response->id,
                    'password'                      => encrypt(Str::random(8))
                ]
            );
                // if user is already present, update user's facebook id if not any.
                if($user){
                    $user->google_id = $response->id;
                    $user->save();
                }
                // authenticate user based on role
                Auth::login($user);
                $home = auth()->user()->isAdmin() ? '/dashboard' : '/';
                return redirect()->intended($home.'#');
        } catch (\Exception $exception) {
            return redirect()->intended('/login'.'#')->with('toast.error', 'Couldn\'t login. Please try again later!');
        }
    }
}
