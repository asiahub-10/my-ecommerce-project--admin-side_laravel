<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/register/upload-image';

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
        return Validator::make($data, [
            'name' => ['required', 'string'],
            'designation' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255'],
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
//        $request = request();
//
//        $userImage  =   $request->file('image');
//        $imageName  =   Auth::id().'_profile'.$userImage->getClientOriginalExtension();
//        $directory  =   'user-image/';
//        $imageUrl   =   $directory.$imageName;
//        Image::make($userImage)->resize(300,300)->save($imageUrl);


        return User::create([
            'name'              => $data['name'],
            'designation'       => $data['designation'],
            'email'             => $data['email'],
            'phone'             => $data['phone'],
//            'image'             => $imageUrl,
            'password'          => bcrypt($data['password']),
        ]);
    }
}








