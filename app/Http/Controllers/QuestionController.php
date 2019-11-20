<?php

namespace Bjora\Http\Controllers;

use Bjora\Http\Requests\QuestionRequest;
use Bjora\Question;
use Bjora\Topic;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with(['user', 'topic'])->paginate(10);
        return view('home', ['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param QuestionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(QuestionRequest $request)
    {
        $user = Auth::user();

        $newQuestion = Question::create([
            'user_id' => $user->id,
            'topic_id' => $request->topic,
            'status' => 'open',
            'question' => $request->question,
        ]);
        $topics = Topic::all();
        return view('question.user-add', ['topics' => $topics]);
    }

    public function createForm(){
        $topics = Topic::all();
        return view('question.user-add', ['topics' => $topics]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Bjora\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Bjora\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Bjora\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Bjora\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
