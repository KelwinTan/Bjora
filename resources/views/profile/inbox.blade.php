@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($messages as $msg)
                    <div class="card">
                        <div class="card-body">
                            <h5>Message From</h5>
                            <div style="display: flex;">
                                <div style="width: 100px; margin-right: 30px;">
                                    <img src="{{url('storage/', $msg->user->profile_picture)}}" alt="profile picture"
                                         style="width: 70px; height: 100px;">
                                </div>
                                <div style="width: 450px;">
                                    <h1>{{$msg->user->username}}</h1>
                                    <p style="margin: 0px; padding: 0px;">{{$msg->user->email}}</p>
                                    <p style="margin: 0px; padding: 0px;">Message: {{$msg->message}}</p>
                                </div>
                                <form action="msg/{{$msg->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="button-red" style="width: 100px;">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div style="display: flex; margin: 10px;">
                    <div style="margin: 0 auto;">
                        {{$messages->appends(request()->input())->links()}}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

