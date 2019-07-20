<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Wishlist;
use App\Product;
class WishlistsController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $wishlists=DB::table('wishlists')->where('user_id',$user->id)->get();
        if(count($wishlists)>0)
        {
            $prod=DB::table('wishlists')->select('product_id')->where('user_id','=',$user->id)->get();
            foreach($prod as $pro)
            {
                
                $proid[]=Product::find($pro->product_id);
            }
        }
        else
             {
                $wishlists=null;
                 $proid[]=null;
             } 
             
             return view('userlayout.mywishlist',compact('wishlists','proid'));
        }
    

    public function add($id)
    {
       $user=Auth::user();
       $product=Product::find($id);
       $wishlists=DB::table('wishlists')->where('user_id',$user->id)->where('product_id',$id)->get();
       if(count($wishlists)>0)
       {
           DB::table('wishlists')->where('user_id',$user->id)->where('product_id',$id)->delete();
       }
       else{
           $wishlist=new Wishlist;
           $wishlist->user_id=$user->id;
           $wishlist->product_id=$id;
           $wishlist->save();
       }

    //    $wishlists=DB::table('wishlists')->where('user_id',$user->id)->get();
    //    if(count($wishlists)>0)
    //    {
    //        $prod=DB::table('wishlists')->select('product_id')->where('user_id','=',$user->id)->get();
    //        foreach($prod as $pro)
    //        {
               
    //            $proid[]=Product::find($pro->product_id);
    //        }
    //    }
    //    else
    //         {
    //            $wishlists=null;
    //             $proid[]=null;
    //         } 
            
    //         return view('userlayout.mywishlist',compact('wishlists','proid'));
    //    }
    // $products= Product::all();
    // return view('userlayout.home',compact('products'));
    return back();
    }
    
}
