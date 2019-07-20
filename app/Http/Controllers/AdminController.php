<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Booking;
use App\Cart;
use App\Wishlist;
use App\Payment;
use DB;
class AdminController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
   }
   public function admin()
   {  
      $products= Product::all();
      return view('adminlayout.home',compact('products'));
    
   }
   
    public function add()
     {
      return view('adminlayout.add');
     }

     public function store(Request $request)
  {
   $this->validate($request,[
     'type'=>['string','required'],
     'title'=>['required'],
     'discription'=>['required','max:160'],
     'price'=>['required'],
     'image1'=>['image'],
     'image2'=>['image'],
     'image3'=>['image'],
     'image4'=>['image'],
   ]);
      $dis=$request->input('discount');
      $yes="Yes";
      if(strcmp($dis,$yes)!==0)
      {
        $disc=false; 
        $discp=0;
      }
        else
        {
       $disc=true;
        $discp=$request->input('discount_price');  
      }
   if($request->hasFile('image1'))
   {
     $filenameWithExt=$request->file('image1')->getClientOriginalName();
     $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
     $extension=$request->file('image1')->getClientOriginalExtension();
     $fileNameToStore1=$filename.'-'.time().'.'.$extension;
     $path=$request->file('image1')->storeAs('public/jewellers',$fileNameToStore1);
   }
   else
   $fileNameToStore1=null;
   if($request->hasFile('image2'))
   {
     $filenameWithExt=$request->file('image2')->getClientOriginalName();
     $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
     $extension=$request->file('image2')->getClientOriginalExtension();
     $fileNameToStore2=$filename.'-'.time().'.'.$extension;
     $path2=$request->file('image2')->storeAs('public/jewellers',$fileNameToStore2);
   }
   else
   $fileNameToStore2=null;
   if($request->hasFile('image3'))
   {
     $filenameWithExt=$request->file('image3')->getClientOriginalName();
     $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
     $extension=$request->file('image3')->getClientOriginalExtension();
     $fileNameToStore3=$filename.'-'.time().'.'.$extension;
     $path3=$request->file('image3')->storeAs('public/jewellers',$fileNameToStore3);
   }
   else
   $fileNameToStore3=null;
   if($request->hasFile('image4'))
   {
     $filenameWithExt=$request->file('image4')->getClientOriginalName();
     $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
     $extension=$request->file('image4')->getClientOriginalExtension();
     $fileNameToStore4=$filename.'-'.time().'.'.$extension;
     $path4=$request->file('image4')->storeAs('public/jewellers',$fileNameToStore4);
   }
   else
   $fileNameToStore4=null;
  $products=new Product;
  $products->type=$request->get('type');
  $products->title=$request->input('title');
  $products->discription=$request->input('discription');
  $products->price=$request->input('price');
  $products->discount=$disc;
  $products->discount_price=$discp;
  $products->image1=$fileNameToStore1;
  $products->image2=$fileNameToStore2;
  $products->image3=$fileNameToStore3;
  $products->image4=$fileNameToStore4;
  $products->qty_avl=$request->input('qty_avl');
  $products->save();
  $products= Product::all();
  return view('adminlayout.home',compact('products'));

  }

  public function remove($id){

  $payments=DB::table('payments')->where('product_id','=',$id)->delete();
  $bookings=DB::table('bookings')->where('product_id','=',$id)->delete();
  $wishlists=DB::table('wishlists')->where('product_id','=',$id)->delete();
  $carts=DB::table('carts')->where('product_id','=',$id)->delete();
  $comments=DB::table('comments')->where('product_id','=',$id)->delete();
  $products=DB::table('products')->where('id','=',$id)->delete();
  
  return back();
  }

  public function edit($id)
  {
    $product=Product::find($id);
    return view('adminlayout.editproduct',compact('product'));
  }

  public function update($id,Request $request)
  {
      if(!empty($request->title))
      {
        DB::table('products')->where('id','=',$id)->update(['title'=>$request->title]); 
      }
    
      if(!empty($request->discription))
      {
        DB::table('products')->where('id','=',$id)->update(['discription'=>$request->discription]); 
      }

      if(!empty($request->price))
      {
        DB::table('products')->where('id','=',$id)->update(['price'=>$request->price]); 
      }
      if(!empty($request->discount_price))
      {
        DB::table('products')->where('id','=',$id)->update(['discount_price'=>$request->discount_price]); 
      }
      if(!empty($request->qty_avl))
      {
        DB::table('products')->where('id','=',$id)->update(['qty_avl'=>$request->qty_avl]); 
      }

      $products= Product::all();
      return view('adminlayout.home',compact('products'));
  }

}
