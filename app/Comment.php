<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;
class Comment extends Model
{
protected $fillable=['id','comment','user_id','product','stars'];
 
public function user()
{
    return $this->belongsTo('App\User');
}
public function Product()
{
    return $this->hasMany('App\Product');
}
}
