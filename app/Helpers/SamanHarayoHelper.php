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

    /**
     * $value is the value which needs to be slugify
     * $model is the model where uniqueness need to be checked
     * $current_id is the id in case of update
     * $dependent column is the column whose value use used to slugify
     * @param $value
     * @param $model
     * @param $current_id
     * @param $dependent_column
     */
    public static function uniqueSlugify($value, $model, $current_id, $dependent_column, $dependent_array = [])
    {
        $slug = Str::of($value)->slug('-');
        $query = self::prepareQueryForUniqueSlugCheck($model, $slug, $current_id);
        while( $query->exists() ) {
            $slug = self::incrementSlug($slug, $slug, $model, $dependent_column, $dependent_array);
            $query = self::prepareQueryForUniqueSlugCheck($model, $slug, $current_id);
        }
        return $slug;
    }

    public static function incrementSlug($title, $slug, $model, $dependent_column, $dependent_array){

        // get the slug of the latest created post
        $query =  $model::where($dependent_column,$title);

        foreach($dependent_array as $k => $v){
            $query->where($k,$v);
        }
        $max = $query->latest('id')->value('slug');
        if (isset($max[-1]) && is_numeric($max[-1])) {
            $new_slug =  preg_replace_callback('/(\d+)$/', function ($matches) {
                return $matches[1] + 1;
            }, $max);
        }else{
            //will send two only if last digit of last slug is not number
            $new_slug =  "{$slug}-2";
        }
        return $new_slug;
    }

    public static function prepareQueryForUniqueSlugCheck($model, $slug, $current_id)
    {
        $query = $model::where('slug',$slug);
        if(!empty($current_id)){
            $query->where('id','!=',$current_id);
        }
        return $query;
    }
}
