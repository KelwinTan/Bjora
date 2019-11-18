<?php

namespace Bjora\Http\Controllers;

use Bjora\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions = Question::with(['user', 'topic'])->paginate(10);
        return view('home', ['questions' => $questions]);
    }
}
