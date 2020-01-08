<?php

namespace Bjora\Http\Controllers\Auth;

use Bjora\User;
use Bjora\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use mysql_xdevapi\Schema;

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
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
//        Username and Name and Full Name are the same
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'alpha_num', 'min:6', 'confirmed'],
            'gender' => ['required', 'in:Male,Female'],
            'address' => ['required'],
            'birthday' => ['required', 'date'],
            'profile_picture' => ['required', 'image', 'mimes:jpeg,png,jpg'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \Bjora\User
     */
    protected function create(array $data)
    {
//        Function for registering new users
        // Store image to public profile directory, then store the path to profile_picture column in the users table
        $profile_picture = "";
        if (isset($data['profile_picture'])) {
            $img = $data['profile_picture'];
            $profile_picture = Storage::disk('public')->put('profile_picture', $img);
        }
        $newUser = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'address' => $data['address'],
            'profile_picture' => $profile_picture,
            'birthday' => $data['birthday'],
            'role' => User::MEMBER_TYPE,
        ]);

        return $newUser;
    }
}
