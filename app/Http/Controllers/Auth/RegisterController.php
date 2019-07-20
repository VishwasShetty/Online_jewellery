<?php

namespace App\Http\Controllers\Auth;

use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
     protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     protected function validator(array $data)
    {
    //     $this->validate($requ,['profile_image'=>'image|max:1999']
    // );
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
          
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create(array $data)
    {
        ///insering for user table
        $filename1=$data['profile_image'];
        $filenamewithExt=$filename1->getClientOriginalName();
        $filename=pathinfo($filenamewithExt,PATHINFO_FILENAME);
        $extension=$filename1->getClientOriginalExtension();
        $filenameToStore=$filename.'_'.time().'.'.$extension;
        $path=$filename1->storeAs('public/profiles',$filenameToStore);
       return User::create([
            'name' => $data['name'],
            'phone'=>$data['phone'],
            'address'=>$data['address'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profile_image'=>$filenameToStore,
             'type'=>User::DEFAULT_TYPE,
        ]);

    //   $email1=$data['email'];
    // //    $email=$email1->session()->put('user_email',$email1);
    // //    return $email;
    // return $email1;
     }


}
