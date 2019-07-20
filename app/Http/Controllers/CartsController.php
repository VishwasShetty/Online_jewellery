<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Auth;
use App\Product;
use App\User;
use DB;
class CartsController extends Controller
{

    public function index()
    {
        $user=Auth::user();
        $cart=DB::table('carts')->where('user_id','=',$user->id)->get();
        if(count($cart)>0)
        {
        $prod=DB::table('carts')->select('product_id')->where('user_id','=',$user->id)->get();
        foreach($prod as $pro)
        {
            
            $proid[]=Product::find($pro->product_id);
        }
    }
    else
         {
             $cart=null;
             $proid[]=null;
         }
       return view('userlayout.mycart',compact('proid','cart'));
     }
        
    public function add($id)
    {
        
        $user=Auth::user();
        $cart=DB::table('carts')->where('user_id','=',$user->id)->where('product_id',$id)->get();
        if(count($cart)>0){
              $out=new \Symfony\Component\Console\Output\ConsoleOutput();
              $out->writeln("Product is Already in Cart");
        }
        else{
            $cart=new Cart; 
            $cart->user_id=$user->id;
         $cart->product_id=$id;
        $cart->save();
        }
        $cart=DB::table('carts')->where('user_id','=',$user->id)->get();
        if(count($cart)>0)
        {
        $prod=DB::table('carts')->select('product_id')->where('user_id','=',$user->id)->get();
        foreach($prod as $pro)
        {
            $proid[]=Product::find($pro->product_id);
        }
    }
    else
         {
             $cart=null;
             $proid[]=null;
         }
       return view('userlayout.mycart',compact('proid','cart'));   
     }

    public function remove($id)
    {
        $user=Auth::user();
       DB::table('carts')->where('product_id','=',$id)->delete();
       $cart=DB::table('carts')->where('user_id','=',$user->id)->get();
        if(count($cart)>0)
        {
        $prod=DB::table('carts')->select('product_id')->where('user_id','=',$user->id)->get();
        foreach($prod as $pro)
        {
            $proid[]=Product::find($pro->product_id);
        }
    }
    else
         {
             $cart=null;
             $proid[]=null;
         }
       return view('userlayout.mycart',compact('proid','cart'));  

    }
}
