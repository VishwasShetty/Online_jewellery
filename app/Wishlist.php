<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;
class Wishlist extends Model
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
