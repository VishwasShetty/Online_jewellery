<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $products= Product::all();
        $user=Auth::user();
        $user_name=$user->name;
        Session::put('username',$user_name);
        // return view('userlayout.topbar',compact('products'));
         return view('userlayout.home',compact('products'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('userlayout.home');
    }

    public function contactus()
    {
        return view('userlayout.contact');
    }
}
