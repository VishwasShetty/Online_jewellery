<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Product;
use Illuminate\Http\Request;
use App\Comment;
use Auth;
use App\User;
use DB;
class ProductController extends Controller
{
    public function index(){
        return  view('adminlayout.home');
    }
      public function show()
      {
        $products= Product::all();
        return view('userlayout.home',compact('products'));
      }

  public function showproduct($id)
  {
    $product=Product::find($id);
    $user=Auth::user();
    $posts=DB::table('comments')->where('product_id','=',$id)->get();
        if(count($posts)>0)
        {
          foreach($posts as $post)
          {
             $userid[]=User::find($post->user_id);
          }           
  
        }
        else{
          $userid[]=null;
          $posts=null;
        }
    return view('userlayout.showproduct',compact('product','posts','userid'));
  }

  public function search(Request $request)
  {
    $products=DB::table('products')->where('type','=',$request->get('type'))->get();
    if(empty($search))
    {
      $search=null;
    }
    return view('userlayout.search',compact('products'));
  }

}
