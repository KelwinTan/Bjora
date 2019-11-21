@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex;">
                            <div style="width: 100px; margin-right: 30px;">
                                <img src="{{url('storage/', Auth::user()->profile_picture)}}" alt="profile picture"
                                     style="width: 70px; height: 100px;">
                            </div>
                            <div style="width: 450px;">
                                <h1>{{Auth::user()->username}}</h1>
                                <p style="margin: 0px; padding: 0px;">{{Auth::user()->email}}</p>
                                <p style="margin: 0px; padding: 0px;">{{Auth::user()->address}}</p>
                                <p style="margin: 0px; padding: 0px;">{{Auth::user()->birthday}}</p>
                            </div>
                            <div style="width: 150px;">
                                <button class="button-blue" onclick="location.href='{{route('show-update-profile')}}'">
                                    Update Profile
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h1 style="text-align: center;">Other Users</h1>
    @foreach($users as $user)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex;">
                            <div style="width: 100px; margin-right: 30px;">
                                <img src="{{url('storage', $user->profile_picture)}}" alt="Profile Picture"
                                     style="width: 70px; height: 100px;">
                            </div>
                            <div style="width: 450px;">
                                <h1>{{$user->username}}</h1>
                                <p style="margin: 0px; padding: 0px;">{{$user->email}}</p>
                                <p style="margin: 0px; padding: 0px;">{{$user->address}}</p>
                                <p style="margin: 0px; padding: 0px;">{{$user->birthday}}</p>
                            </div>
                            <div style="width: 150px;">
                                <button class="button-blue" onclick="location.href='{{route('show-update-profile')}}'">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach()
@endsection

