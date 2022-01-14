<?php

namespace App\Models;

use Facade\FlareClient\Report;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['created_at','updated_at'];

    public function report(){
        return $this->belongsTo(Report::class);
    }
}
