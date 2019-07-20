<?php

namespace App\Http\Controllers;
use Auth;
use User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        return view('userlayout.myprofile',compact('user'));
    }
    public function update()
    {
        return view('userlayout.myprofile');
    }
}
