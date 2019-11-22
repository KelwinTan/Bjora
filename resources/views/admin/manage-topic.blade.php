@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <button style="width: 150px; margin-bottom: 10px;" class="button-blue"
                    onclick="location.href='{{route('admin-add-topic-form')}}'">Add Topic
            </button>

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
                @foreach($topics as $topic)
                    <tr>
                        <th scope="row">{{$topic->id}}</th>
                        <td class="w-75">{{$topic->topic_name}}</td>
                        <td>
                            <button class="button-yellow w-50"
                                    onclick="location.href='{{route('admin-update-topic-form', ['id' => $topic->id])}}'">
                                Edit
                            </button>
                            <form action="topic/{{$topic->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="button-red w-50">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>
    <div style="display: flex; margin: 10px;">
        <div style="margin: 0 auto;">
            {{$topics->appends(request()->input())->links()}}
        </div>
    </div>
@endsection
