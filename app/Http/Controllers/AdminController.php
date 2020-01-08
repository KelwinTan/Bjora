<?php

namespace Bjora\Http\Controllers;

use Bjora\Admin;
use Bjora\Http\Requests\QuestionRequest;
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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser(UserRequest $request)
    {
        // Store image to public profile directory, then store the path to profile_picture column in the users table
        $profile_picture = "";
        if (isset($request->profile_picture)) {
            $img = $request->profile_picture;
            $profile_picture = Storage::disk('public')->put('profile_picture', $img);
        }
        $newUser = new User();
        $newUser->username = $request->username;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->gender = $request->gender;
        $newUser->address = $request->address;
        $newUser->profile_picture = $profile_picture;
        $newUser->birthday = $request->birthday;
        $newUser->role = User::MEMBER_TYPE;
        $newUser->save();
        return redirect(route('admin-manage-user'));
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

//    Function for manage user form
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

//Function for adding question form
    public function addQuestionForm(){
        $topics = Topic::all();
        return view('question.user-add',  ['topics' => $topics]);
    }

//    Function for deleting question
    public function deleteQuestion(Question $question){
        $question->delete();
        return redirect(route('admin-manage-question'));
    }

//    Function for deleting user
    public function deleteUser(User $user){
        $user->delete();
        return redirect(Route('admin-manage-user'));
    }

    public function updateQuestionForm(Question $question){
        $topics = Topic::all();
        return view('admin.updateQuestion', ['question' => $question, 'topics' => $topics]);
    }

    public function updateQuestion(Question $question, QuestionRequest $request){
        $question->topic_id = $request->topic;
        $question->question = $request->question;

        if($question->isDirty()){
            $question->save();
        }

        return redirect(route('admin-manage-question'));
    }

//    Update User Form
    public function updateUserForm(User $user){

        return view('admin.updateUser', ['user' => $user]);
    }

//    Function for updating user
    public function updateUser(User $user, UserRequest $userRequest){
        $profile_picture = "";
        if(isset($userRequest['profile_picture'])){
            $img = $userRequest['profile_picture'];
            $profile_picture = Storage::disk('public')->put('profile_picture', $img);
        }

        $user->username = $userRequest->username;
        $user->email = $userRequest->email;
        $user->password = Hash::make($userRequest->password);
        $user->gender = $userRequest->gender;
        $user->address = $userRequest->address;
        $user->profile_picture = $profile_picture;
        $user->birthday = $userRequest->birthday;

        if($user->isDirty()){
            $user->save();
        }
        return redirect()->route('admin-manage-user');
    }

//    Function for closing question status
    public function closeQuestion(Question $question){
        $question->status = 'closed';
        $question->save();
        return redirect(Route('admin-manage-question'));
    }

}
