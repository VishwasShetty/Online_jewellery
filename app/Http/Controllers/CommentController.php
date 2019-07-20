<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use DB;
Use Auth;
use Session;

class CommentController extends Controller
{
   public function index()
   {
  

   }

    public function add($id,Request $request)
    {
       $user=Auth::user();
       $comment=new Comment;
      
       $post=DB::table('comments')->where('user_id','=',$user->id)->where('product_id','=',$id)->get();
        if(count($post)>0)
        {
            
           $comment=$request->input('comment');
           $stars=$request->input('stars');
           DB::table('comments')->where('user_id','=',$user->id)->where('product_id','=',$id)->update(['comment'=>$comment,'stars'=>$stars]);
        }

        else
        {
           $comment->comment=$request->input('comment');
           $comment->user_id=$user->id;
           $comment->product_id=$id;
           $comment->stars=$request->input('stars');
           $comment->save();
        }
       return back();
    }
}
