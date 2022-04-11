<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $dates = ['created_at','updated_at'];

    const VIA_STRIPE = 'stripe';
    const VIA_PAYPAL = 'paypal';

}
