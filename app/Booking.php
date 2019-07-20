<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable=['id','user_id','product_id','qty','status','total_price','payment_id'];

    public function product()
    {
        return $this->blongsTo('App\Product');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function payment()
    {
        return $this->hasOne('App\Payment');
    }
}
