<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use PayPal\Api\Item;

class Report extends Model
{
    use HasFactory;
    use Notifiable;

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


    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    public function claimImages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ItemImage::class, 'report_id', 'id')->where('claim', 1);
    }

    public function claimUsers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class,'claim_user', 'report_id', 'user_id')->withTimestamps()->withPivot('description', 'detail_status', 'report_status');
    }

    public function feature(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Feature::class);
    }

    public function verifiedUser(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_user', 'id');
    }

    public function itemImages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ItemImage::class, 'report_id', 'id')->where('claim', 0);
    }

    public function location(){
        return $this->hasOne(Location::class);
    }

    public function randomImage(){
        return $this->hasOne(ItemImage::class, 'report_id', 'id')->where('claim', 0)->inRandomOrder();
    }

    public function reward(){
        return $this->hasOne(Reward::class, 'report_id', 'id');
    }
//    public function users(){
//        return $this->belongsToMany(User::class);

//    }

}
