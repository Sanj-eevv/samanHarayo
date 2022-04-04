<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PayPal\Api\Item;

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

    const REPORT_TYPE_LOST = 'lost';
    const REPORT_TYPE_FOUND = 'found';
    const DETAIL_STATUS = ['pending','verified', 'rejected' ];
    const REPORT_STATUS = [ 'pending', 'verified', 'rejected'];


    public function ItemImages(){
        return $this->hasMany(ItemImage::class, 'report_id', 'id')->where('claim', 0);
    }
    public function claimImages(){
        return $this->hasMany(ItemImage::class, 'report_id', 'id')->where('claim', 1);
    }
    public function location(){
        return $this->hasOne(Location::class);
    }

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function reward(){
        return $this->hasOne(Reward::class, 'report_id', 'id');
    }

    public function randomImage(){
        return $this->hasOne(ItemImage::class, 'report_id', 'id')->where('claim', 0)->inRandomOrder();
    }

//    public function users(){
//        return $this->belongsToMany(User::class);
//    }

    public function claimUsers(){
            return $this->belongsToMany(User::class,'claim_user', 'report_id', 'user_id')->withTimestamps()->withPivot('description', 'detail_status', 'report_status');
    }

}
