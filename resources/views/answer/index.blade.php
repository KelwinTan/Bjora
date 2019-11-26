@extends('layouts.app')

@section('content')
    <div class="container" style="padding-bottom: 40px; width: 100%;">
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; justify-content: space-between;">
                            <p style="color: lightgrey;">{{$question->topic->topic_name}}</p>
                            @if($question->status === "open")
                                <p style="background-color: green; color: white;">
                                    {{$question->status}}
                                </p>
                            @elseif($question->status === "closed")
                                <p style="background-color: red; color: white;">
                                    {{$question->status}}
                                </p>
                            @endif
                        </div>
                        <div style="display: flex;">
                            <div style="width: 100px; margin: 20px;">
                                <img style="width: 70px; height: 100px;"
                                     src="{{url('storage', $question->user->profile_picture)}}" alt="profile picture">
                            </div>
                            <div>
                                <p>{{$question->question}}</p>
                                <a href="{{route('show-other-profile', $question->user->id)}}"
                                   style="color: rgba(52, 144, 220, 0.9) !important;">{{$question->user->username}}</a>
                                <p style="color: darkgrey;">Created At: {{$question->created_at}}</p>

                            </div>

                        </div>
                        @foreach($question->answers as $answer)
                            <div class="card">
                                <div style="margin: 10px;">

                                    <div style="display: flex;">
                                        <div style="width: 100px; margin: 20px;">
                                            <img style="width: 70px; height: 100px;"
                                                 src="{{url('storage', $answer->user->profile_picture)}}"
                                                 alt="profile picture">
                                        </div>
                                        <div>
                                            <a style="color: rgba(52, 144, 220, 0.9) !important;"
                                               href="{{route('show-other-profile', $answer->user->id)}}">{{$answer->user->username}}</a>
                                            <p style="color: darkgrey;">Answered At: {{$answer->updated_at}}</p>
                                            <p>{{$answer->answer}}</p>
                                            @if(Auth::user() !== null and $answer->user->id === Auth::user()->id)

                                                <button class="button-blue" onclick="window.location='{{Route('answer-update-form', $answer->id )}}'">Update</button>
                                                <form action="{{$answer->id}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="button-red" type="submit">Delete</button>
                                                </form>

                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if(Auth::user() !== null and $question->user->id !== Auth::user()->id)

                        <div style="margin: 10px;">
                            <form method="POST" action="{{ route('answer-question', $question->id ) }}"
                                  enctype="multipart/form-data">
                                @csrf

                                <textarea name="answer" id="" cols="30" rows="10" style="width: 100%;"></textarea>
                                <button class="button-blue">
                                    {{ __('Answer') }}
                                </button>
                            </form>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
