<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['id'];
    protected $table = 'features';
    protected $dates = ['created_at', 'updated_at', 'expiry_date'];

    public function report(){
        return $this->belongsTo(Report::class, 'report_id', 'id');
    }
}
