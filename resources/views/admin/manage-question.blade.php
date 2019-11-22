@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <button style="width: 150px; margin-bottom: 10px;" class="button-blue" onclick="location.href='{{route('admin-add-question-form')}}'">Add Question</button>

            <hr/>

            <table class="table">

                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Topic Name</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr>
                        <th scope="row">{{$question->id}}</th>
                        <td class="w-75">{{$question->question}}</td>
                        <td>
                            <button class="button-yellow w-50">Edit</button>
                            <button class="button-red w-50">Delete</button>
                            <button class="button-gray w-50">Closed</button>
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
