<?php

namespace App\Http\Controllers\Common;

use App\Helpers\ProfileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::User()->load('role');
        return view('dashboard.profiles.index', compact('user'));
    }

    public function edit(){
        $user = auth()->user();
        return view('dashboard.profiles.edit',compact('user'));
    }

    public function editPassword()
    {
        return view('dashboard.profiles.editPassword');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        ProfileHelper::updateProfile($request);
        return redirect()->route('profile.index')->with('alert.success','Successfully Updated!!');
    }

    public function removeAvatar(){

        return ProfileHelper::profileRemoveAvatar();
    }

    public function updatePassword(PasswordRequest $request): \Illuminate\Http\RedirectResponse
    {
        ProfileHelper::changeProfile($request);
        return redirect()->route('profile.index')->with('alert.success','Password Changed Successfully');
    }
}
