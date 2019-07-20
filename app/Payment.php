<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Booking;
class Payment extends Model
{

    protected $fillable=['id','product_id','name','option'];
    public $table="payments";

    Public function user()
    {
        return $this->belongsToMany('App\User');
    }

    Public function Booking()
    {
        return $this->belongsToMany('App\Booking');
    }
}
