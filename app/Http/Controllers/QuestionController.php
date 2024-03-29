<?php

namespace Bjora\Http\Controllers;

use Bjora\Http\Requests\QuestionRequest;
use Bjora\Question;
use Bjora\Topic;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request === null){
            $questions = Question::with(['user', 'topic'])->paginate(10);
        }
        else{
            $questions = Question::with(['user'])->where('question', 'like', '%'.$request->search.'%')->orWhereHas('user', function($query) use ($request){
                $query->where('username', 'like', "%{$request->search}%");
            })->paginate(10);
        }
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
        $user = Auth::user();
        if($user === null) return redirect()->route('home');
        $questions = Question::with(['user', 'topic'])->where('user_id', '=', $user->id)->paginate(10);
        return view('question.myquestion', ['questions' => $questions]);
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
    public function update(QuestionRequest $request, Question $question)
    {
        $user = Auth::user();
        $question->user_id = $user->id;
        $question->question = $request->question;
        $question->topic_id = $request->topic;
        if($question->isDirty()){
            $question->save();
        }
        $topics = Topic::all();
        return redirect(Route('user-question'));
    }

    public function updateForm($id)
    {
        $question = Question::with(['user', 'topic'])->where('id', '=', $id)->first();
//        dd($question);
        $topics = Topic::all();
        return view('question.update', ['question' => $question, 'topics' => $topics]);
    }

    public function close(Question $question){
        $question->status = 'closed';
        $question->save();
        return redirect(Route('user-question'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Bjora\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect(Route('user-question'));
    }
}
