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


    public function ItemImages(){
        return $this->hasMany(ItemImage::class, 'report_id', 'id');
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

////    TODO: LocalScope;
//    public function featured_photo(){
//        return $this->hasOne(Photo::class, 'report_id', 'id')->where(function($q){
//            $q->where('featured', 'yes');
//        });
//    }
    public function randomImage(){
        return $this->hasOne(ItemImage::class, 'report_id', 'id')->inRandomOrder();
    }

    Public function users(){
        return $this->belongsToMany(User::class);
    }

}
