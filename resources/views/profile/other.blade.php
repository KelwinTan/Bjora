@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex;">
                            <div style="width: 100px; margin-right: 30px;">
                                <img src="{{url('storage/', $user->profile_picture)}}" alt="profile picture"
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
                                    Update Profile
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

