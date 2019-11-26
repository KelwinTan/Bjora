@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5>Sending Message to: </h5>
                        <div style="display: flex;">
                            <div style="width: 100px; margin-right: 30px;">
                                <img src="{{url('storage/', $recipient->profile_picture)}}" alt="profile picture"
                                     style="width: 70px; height: 100px;">
                            </div>
                            <div style="width: 450px;">
                                <h1>{{$recipient->username}}</h1>
                                <p style="margin: 0px; padding: 0px;">{{$recipient->email}}</p>
                                <p style="margin: 0px; padding: 0px;">{{$recipient->address}}</p>
                                <p style="margin: 0px; padding: 0px;">{{$recipient->birthday}}</p>
                            </div>
                        </div>
                        <div style="width: 100%;">
                            <form method="POST" action="{{ route('user-send-msg', $recipient->id) }}" enctype="multipart/form-data">
                                @csrf
                                <textarea name="message" id="" cols="30" rows="10" style="width: 100%;"></textarea>
                                <button class="button-blue" type="submit">
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

