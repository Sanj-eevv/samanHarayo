<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const VERIFIED = 'VERIFIED';
    const NOT_VERIFIED = 'UNVERIFIED';
}
