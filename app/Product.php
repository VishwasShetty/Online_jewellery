<?php

namespace App;
use App\User;
use App\Booking;
use App\Cart;
use App\Wishlist;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
       'type', 'title','discription','price', 'discount', 'discount_price','image1','image2','image3','image4','qty_avl',
    ];
    public $table="products";

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Booking()
    {
        return $this->belongsTo('App\Booking');
    }

     public function cart()
     {
         return $this->belongsTo('App\Cart');
     }

     public function wishlist()
     {
         return $this->belongsTo('App\Wishlist');
     }
     public function comment()
     {
         return $this->belongsTo('App\Comment');
     }

}
