@extends('layouts.app')

@section('content')
    <div class="container" style="padding-bottom: 40px; width: 100%;">
        @foreach($questions as $question)
            <div class="row justify-content-center mt-2">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-body">
                            {{--                        <form method="POST" action="{{ route('member-add-question') }}" enctype="multipart/form-data">--}}
                            {{--                            @csrf--}}

                            {{--                            <div class="form-group row">--}}
                            {{--                                <label for="address"--}}
                            {{--                                       class="col-md-4 col-form-label text-md-right">{{ __('Question') }}</label>--}}

                            {{--                                <div class="col-md-6">--}}
                            {{--                                    <textarea style="width: 100%; height: 200px;" name="question"--}}
                            {{--                                              placeholder="Insert Your Question...">{{old('question')}}</textarea>--}}
                            {{--                                    @error('question')--}}
                            {{--                                    <span class="invalid-feedback" role="alert">--}}
                            {{--                                            <strong>{{ $message }}</strong>--}}
                            {{--                                        </span>--}}
                            {{--                                    @enderror--}}

                            {{--                                </div>--}}
                            {{--                                <div class="col-md-4 col-form-label text-md-right"></div>--}}
                            {{--                                <div class="col-md-6">--}}

                            {{--                                    @error('question')--}}
                            {{--                                    <span class="invalid-feedback" role="alert">--}}
                            {{--                                            <strong>{{ $message }}</strong>--}}
                            {{--                                        </span>--}}
                            {{--                                    @enderror--}}
                            {{--                                </div>--}}

                            {{--                            </div>--}}
                            {{--                            @if ($errors->any())--}}
                            {{--                                <div class="alert alert-danger">--}}
                            {{--                                    <ul>--}}
                            {{--                                        @foreach ($errors->all() as $error)--}}
                            {{--                                            <li>{{ $error }}</li>--}}
                            {{--                                        @endforeach--}}
                            {{--                                    </ul>--}}
                            {{--                                </div>--}}
                            {{--                            @endif--}}

                            {{--                            <div class="form-group row mb-0">--}}
                            {{--                                <div class="col-md-6 offset-md-4">--}}
                            {{--                                    <button type="submit" class="btn btn-primary">--}}
                            {{--                                        {{ __('Add Question') }}--}}
                            {{--                                    </button>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                        </form>--}}
                            <p style="color: lightgrey;">{{$question->topic->topic_name}}</p>
                            <div style="display: flex;">
                                <div style="width: 100px; margin: 20px;">
                                    <img style="width: 70px; height: 100px;"
                                         src="{{url('storage', $question->user->profile_picture)}}"
                                         alt="profile picture">
                                </div>
                                <div style="width: 80%;">
                                    <p>{{$question->question}}</p>
                                    <a style="color: rgba(52, 144, 220, 0.9) !important;"
                                       href="{{route('show-other-profile', $question->user->id)}}">{{$question->user->username}}</a>
                                    <p style="color: darkgrey;">Created At: {{$question->created_at}}</p>
                                    <button class="button-blue"
                                            onclick="window.location='{{Route('show-answer', $question->id )}}'">See
                                        Answer
                                    </button>
                                    <button class="button-yellow"
                                            onclick="window.location='{{Route('update-question-form', $question->id )}}'">
                                        Edit
                                    </button>
                                    @if($question->status === "open")
                                        <form action="/question/closed/{{$question->id}}" method="POST">
                                            @method('PUT')
                                            <button style="background-color: red;" type="submit">closed</button>
                                        </form>
                                        {{--                                    @elseif($question->status === "closed")--}}
                                        {{--                                        <button style="background-color: green;">open</button>--}}
                                    @endif
                                    <form action="{{$question->id}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="button-red">Delete</button>
                                    </form>

                                </div>
                                <div style="margin-left: 20px;">
                                    @if($question->status === "open")
                                        <div style="background-color: green; color: white;">
                                            {{$question->status}}
                                        </div>
                                    @elseif($question->status === "closed")
                                        <div style="background-color: red; color: white;">
                                            {{$question->status}}
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div style="display: flex; margin: 10px;">
            <div style="margin: 0 auto;">
                {{$questions->appends(request()->input())->links()}}
            </div>
        </div>
@endsection

