<?php

namespace App\Http\Controllers;
use App\User;
use Session;
use DB;
use Auth;
use App\Booking;
use App\Payment;
use Illuminate\Http\Request;
use App\Product;
class PaymentsController extends Controller
{
    public function show($id)
     {
     $product=Product::find($id);
     return view('userlayout.payment')->with('product',$product);   
    }

    public function confirm($id,Request $request)
    {
        $product=Product::find($id);
        $user=Auth::user();
        if(($product->qty_avl)>$request->qty)
        {
        //checking wether user already booked the product
        $bookings=DB::table('bookings')->where('user_id','=',$user->id)->where('product_id','=',$id)->get();
        if(count($bookings)!=0)
        {

            $qty=$request->qty;
            $proqty=DB::table('products')->where('id','=',$id)->get();
            foreach($proqty as $pqty){
                $totqty=$pqty->qty_avl-$qty;
            }
            DB::table('products')->where('id','=',$id)->update(['qty_avl'=>$totqty]);

            $qtydb=DB::table('bookings')->where('user_id','=',$user->id)->where('product_id','=',$id)->get();
            $total= $product->price-$product->discount_price;
            $total_price=$total*$qty;
            foreach($qtydb as $qt){
            $qtyup=$qty+$qt->qty;}
            foreach($qtydb as $qt){
            $priceup=$total_price+$qt->total_price;}
            $updateDetailes=['qty'=>$qtyup,'total_price'=>$priceup];
            DB::table('bookings')->where('user_id','=',$user->id)->where('product_id','=',$id)->update(['qty'=>$qtyup,'total_price'=>$priceup]);
        }
 
else
{
        $qty=$request->qty;

        $proqty=DB::table('products')->where('id','=',$id)->get();
        foreach($proqty as $pqty){
            $totqty=$pqty->qty_avl-$qty;
        }
        DB::table('products')->where('id','=',$id)->update(['qty_avl'=>$totqty]);


        $paymethod=$request->input('payment');
         $prodid=$id;
        $total= $product->price-$product->discount_price;
        $total_price=$total*$qty;

        $payment=new Payment;
        $payment->product_id=$id;
        $payment->option=$paymethod;
        $payment->save();
        $proid=DB::table('payments')->select('id')->where('product_id','=',$prodid)->first();
        $payid=$proid->id;
      
        $booking=new Booking;
        $booking->user_id=$user->id;
        $booking->product_id=$prodid;
        $booking->qty=$qty;
        $booking->status="confirmed";
        $booking->total_price=$total_price;
        $booking->payment_id=$payid;
        $booking->save();
       
     


}        
}

else
{
    $bookings=DB::table('bookings')->where('user_id','=',$user->id)->where('product_id','=',$id)->get();
    if(count($bookings)!=0)
    {

        $qty=$product->qty_avl;
        $proqty=DB::table('products')->where('id','=',$id)->get();
        foreach($proqty as $pqty){
            $totqty=$pqty->qty_avl-$qty;
        }
        DB::table('products')->where('id','=',$id)->update(['qty_avl'=>$totqty]);

        $qtydb=DB::table('bookings')->where('user_id','=',$user->id)->where('product_id','=',$id)->get();
        $total= $product->price-$product->discount_price;
        $total_price=$total*$qty;
        foreach($qtydb as $qt){
        $qtyup=$qty+$qt->qty;}
        foreach($qtydb as $qt){
        $priceup=$total_price+$qt->total_price;}
        $updateDetailes=['qty'=>$qtyup,'total_price'=>$priceup];
        DB::table('bookings')->where('user_id','=',$user->id)->where('product_id','=',$id)->update(['qty'=>$qtyup,'total_price'=>$priceup]);
    }
else
{
    {
        $qty=$product->qty_avl;

        $proqty=DB::table('products')->where('id','=',$id)->get();
        foreach($proqty as $pqty){
            $totqty=$pqty->qty_avl-$qty;
        }
        DB::table('products')->where('id','=',$id)->update(['qty_avl'=>$totqty]);


        $paymethod=$request->input('payment');
         $prodid=$id;
        $total= $product->price-$product->discount_price;
        $total_price=$total*$qty;

        $payment=new Payment;
        $payment->product_id=$id;
        $payment->option=$paymethod;
        $payment->save();
        $proid=DB::table('payments')->select('id')->where('product_id','=',$prodid)->first();
        $payid=$proid->id;
      
        $booking=new Booking;
        $booking->user_id=$user->id;
        $booking->product_id=$prodid;
        $booking->qty=$qty;
        $booking->status="confirmed";
        $booking->total_price=$total_price;
        $booking->payment_id=$payid;
        $booking->save();
       
     


}  
}

}
        $products= Product::all();
        return view('userlayout.home',compact('products'))->with('message','booking confirmed');

      
}


}
