<?php

namespace App;
use App\User;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=['id','user_id','product_id'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
