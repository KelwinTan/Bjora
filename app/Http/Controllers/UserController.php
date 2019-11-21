<?php

namespace Bjora\Http\Controllers;

use Bjora\Http\Requests\UserRequest;
use Bjora\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function showProfile()
    {
        $others = User::where('id', '!=', \auth()->id())->get();
        return view('profile.profile', ['users' => $others]);
    }

    public function showUpdateProfile()
    {
        return view('profile.update');
    }

    public function updateProfile(UserRequest $userRequest){


        $profile_picture = "";
        if(isset($userRequest['profile_picture'])){
            $img = $userRequest['profile_picture'];
            $profile_picture = Storage::disk('public')->put('profile_picture', $img);
        }

        $currUser = Auth::user();

//        $newUser = User::create([
//            'username' => $data['username'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//            'gender' => $data['gender'],
//            'address' => $data['address'],
//            'profile_picture' => $profile_picture,
//            'birthday' => $data['birthday'],
//            'role' => User::MEMBER_TYPE,
//        ]);

        $currUser->username = $userRequest->username;
        $currUser->email = $userRequest->email;
        $currUser->password = Hash::make($userRequest->password);
        $currUser->gender = $userRequest->gender;
        $currUser->address = $userRequest->address;
        $currUser->profile_picture = $profile_picture;
        $currUser->birthday = $userRequest->birthday;
        $currUser->save();

        return redirect()->route('show-profile');
    }


}
