<?php


namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileHelper
{
    public static function updateProfile($request)
    {
        $user = Auth::User();
        //dd($request->hasFile('image'));
        DB::transaction(function () use ($request, $user ) {
            if ($request->hasFile('image')) {
                @unlink(public_path('storage/uploads/users/'.$user->id.'/'.$user->avatar));
                $imageName = SamanHarayoHelper::renameImageFileUpload($request->file('image'));
                $request->file('image')->storeAs(
                    'public/uploads/users/'.$user->id, $imageName
                );
                $user->avatar = $imageName;
            }
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->updated_at = date('Y-m-d H:i:s');
            $user->save();
        });
        return true;
    }
    public static function profileRemoveAvatar(){
        $user = Auth::user();
        if(empty(!$user->avatar)){
            Storage::delete('public/uploads/users/'.$user->id.'/'.$user->avatar);
            $user->avatar = '';
            $user->updated_at = now();
            $user->save();
            return response()->json([
                'message' => 'Avatar Successfully Deleted',
            ], 200);
        }else{
            return response()->json([], 204);
        }
    }
    public static function profileSetTimeZone($request){

        $user = \Auth::user();
        $user->timezone = $request->input('timezone');
        $user->save();
        return response()->json([],200);
    }

    public static function changeProfile($request){

        $user= auth::user();
        $user->password = Hash::make($request->input('password'));
        $user->updated_at = now();
        $user->save();
    }
}
