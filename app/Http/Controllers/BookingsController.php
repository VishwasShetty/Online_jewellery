<?php

namespace App\Http\Controllers;
use App\Booking;
use App\Product;
use App\Payment;
use Auth;
use DB;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function index()
    {

        $user=Auth::user();
        $bookings=DB::table('bookings')->where('user_id','=',$user->id)->get();
        if(count($bookings)>0)
        {
            $prod=DB::table('bookings')->select('product_id')->where('user_id','=',$user->id)->get();
       
    foreach($prod as $pro)
       {
           $proid[]=Product::find($pro->product_id);
       } 
     $pays=DB::table('bookings')->select('payment_id')->where('user_id','=',$user->id)->get();   
      
      foreach($pays as $pay)
      {
         
         $payid[]=Payment::find($pay->payment_id);
    } 
        }
        else
        {
            $bookings=null;
            $proid[]=null;
            $payid[]=null;
            
        }

     return view('userlayout.mybookings',compact('bookings','proid','payid'));
}

public function cancel($id)
{
    $bookings=Booking::find($id);
    $qtys=DB::table('bookings')->select('qty','product_id')->where('id','=',$id)->get();
    foreach($qtys as $q)
    {
        $qty=$q->qty;
        $proid=$q->product_id;
    }    

  
    $proqty=DB::table('products')->select('qty_avl')->where('id','=',$proid)->get();
    foreach($proqty as $q)
    {
       $totqty=$q->qty_avl+$qty;
    }
     DB::table('products')->where('id','=',$proid)->update(['qty_avl'=>$totqty]);

    $paymid=$bookings->payment_id;
    $bookings->delete();
    $user=Auth::user();
    
    DB::table('payments')->delete($paymid);
    return back();
    
}

}