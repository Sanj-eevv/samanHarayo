<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['id'];
    protected $table = 'reports';

    const STATUS_VERIFIED = 'verified';
    const STATUS_PENDING = 'pending';
    const REPORT_TYPE_LOST = 'lost';
    const REPORT_TYPE_FOUND = 'found';

    public function location(){
        return $this->hasOne(Location::class);
    }
}
