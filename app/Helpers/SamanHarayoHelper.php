<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class SamanHarayoHelper
{
    public static function renameImageFileUpload($file): string
    {
        $imageName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        return Str::of($imageName)->slug('_').'_'.date('YmdHis').'.'.$file->extension();
    }
}
