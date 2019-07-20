<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use  App\Product;
use App\Booking;
use App\Payment;
use App\Cart;
use App\Wishlist;
use App\Comment;
class User extends Authenticatable
{
    use Notifiable;
    const ADMIN_TYPE='admin';
    const DEFAULT_TYPE='default';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','phone','address', 'email', 'password','profile_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function product(){
        return $this->hasMany('App\Product');
    }
    public function Booking(){
        return $this->hasMany('App\Booking');
    }

    public function cart(){
        return $this->hasMany('App\Cart');
    }

    public function wishlist()
    {
        return $this->hasMany('App\Wishlist');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    public function isAdmin()
    {
        return $this->type==self::ADMIN_TYPE;
    }
}

