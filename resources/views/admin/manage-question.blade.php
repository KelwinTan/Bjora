@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <button style="width: 150px; margin-bottom: 10px;" class="button-blue"
                    onclick="location.href='{{route('admin-add-question-form')}}'">Add Question
            </button>

            <hr/>

            <table class="table">

                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Question</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr>
                        <th scope="row">{{$question->id}}</th>
                        <td style="width: 100px;">
                            {{$question->topic->topic_name}}
                        </td>
                        <td style="width: 100px;">
                            {{$question->user->username}}
                        </td>
                        <td class="w-75">
                            <p>{{$question->question}}</p>

                        </td>
                        <td style="width: 30px;">
                            @if($question->status === "open")
                                <p style="color: lightgreen;">{{$question->status}}</p>
                            @elseif($question->status === "closed")
                                <p style="color:red;">{{$question->status}}</p>
                            @endif
                        </td>

                        <td class="w-25">

                            <button class="button-yellow w-50"
                                    onclick="location.href='{{route('admin-update-question-form', $question->id)}}'">
                                Edit
                            </button>

                            <form action="question/{{$question->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="button-red w-50">Delete</button>
                            </form>
                            @if($question->status === "open")
                                <form action="{{route('admin-close-question', $question->id)}}" method="POST">
                                    @method('PUT')
                                    <button type="submit" class="w-50 button-gray">closed</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>
    <div style="display: flex; margin: 10px;">
        <div style="margin: 0 auto;">
            {{$questions->appends(request()->input())->links()}}
        </div>
    </div>
@endsection
