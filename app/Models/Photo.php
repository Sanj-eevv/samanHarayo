<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected  $guarded = ['id'];

    const STORE_TYPE_TEMPORARY = 'temp';

    const STORE_TYPE_PERMANENT = 'perm';

    const NOT_FEATURED = 'no';

    const FEATURED = 'yes';

}
