<?php

namespace Bjora\Http\Controllers;

use Bjora\Http\Requests\TopicRequest;
use Bjora\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
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

    public function createForm()
    {
        $topics = Topic::all();
        return view('topic.add', ['topics' => $topics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TopicRequest $request)
    {
        $topic = new Topic();
        $topic->topic_name = $request->topic_name;
        $topic->save();
        return redirect(route('admin-manage-topic'));
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
     * @param \Bjora\Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Bjora\Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Bjora\Topic $topic
     * @return \Illuminate\Http\Response
     */
//    Function for updating topics
    public function update(TopicRequest $request, Topic $topic)
    {
        $topic->topic_name = $request->topic_name;
        if($topic->isDirty()){
            $topic->save();
        }
        return redirect(route('admin-manage-topic'));
    }

    public function updateForm($id)
    {
        $topic = Topic::find($id);
        return view('topic.update', ['topic' => $topic]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Bjora\Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();
        return redirect(route('admin-manage-topic'));
    }
}
