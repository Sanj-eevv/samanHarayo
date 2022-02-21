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

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function boost(){
        return $this->hasOne(Boost::class, 'report_id', 'id');
    }

    public function reward(){
        return $this->hasOne(Reward::class, 'report_id', 'id');
    }

//    TODO: LocalScope;
    public function featured_photo(){
        return $this->hasOne(Photo::class, 'report_id', 'id')->where(function($q){
            $q->where('featured', 'yes');
        });
    }
    public function random_photo(){
        return $this->hasOne(Photo::class, 'report_id', 'id')->inRandomOrder();
    }

    public function photos(){
        return $this->hasMany(Photo::class, 'report_id', 'id');
    }
}
