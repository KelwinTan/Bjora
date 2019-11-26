<?php

namespace Bjora\Http\Controllers;

use Bjora\Answer;
use Bjora\Http\Requests\AnswerRequest;
use Bjora\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $question = Question::with(['answers', 'topic', 'user'])->where('id', '=', $id)->first();
        return view('answer.index', ['question' => $question]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, AnswerRequest $request)
    {
        $newAnswer = new Answer();
        $newAnswer->user_id = Auth::user()->id;
        $newAnswer->question_id = $id;
        $newAnswer->answer = $request->answer;
        $newAnswer->save();
        return redirect(route('show-answer', $id));
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
     * @param \Bjora\Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Bjora\Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Bjora\Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function update(AnswerRequest $request, Answer $answer)
    {
        $answer->answer = $request->answer;
        $answer->updated_at = Carbon::now();
        if($answer->isDirty()){
            $answer->save();
        }
        return back()->with('success', 'Updated the answer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Bjora\Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();
        return back()->with('success', 'Deleted the answer');
    }

    public function updateForm(Answer $answer)
    {
        return view('answer.update', ['answer' => $answer]);
    }

}
