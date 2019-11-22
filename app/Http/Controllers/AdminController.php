<?php

namespace Bjora\Http\Controllers;

use Bjora\Admin;
use Bjora\Http\Requests\UserRequest;
use Bjora\Question;
use Bjora\Topic;
use Bjora\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser(array $data)
    {
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

        return view('admin.manage-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \Bjora\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Bjora\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Bjora\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Bjora\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function manageUser()
    {
        $users = User::paginate(10);
        return view('admin.manage-user', ['users' => $users]);
    }

    public function manageQuestion()
    {
        $questions = Question::paginate(10);
        return view('admin.manage-question', ['questions' => $questions]);
    }

    public function manageTopic()
    {
        $topics = Topic::paginate(10);
        return view('admin.manage-topic', ['topics' => $topics]);
    }

//    function for showing add user form
    public function addUserForm()
    {
        return view('admin.create-user');
    }

    public function addQuestionForm(){
        $topics = Topic::all();
        return view('question.user-add',  ['topics' => $topics]);
    }

}
