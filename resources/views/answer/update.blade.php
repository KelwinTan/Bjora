@extends('layouts.app')

@section('content')
    <div class="container" style="padding-bottom: 40px; width: 100%;">
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
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
                                @endif
                            </div>

                        </div>
                    </div>
                    @if(Auth::user() !== null and $answer->user->id === Auth::user()->id)

                        <div style="margin: 10px;">
                            <form method="POST" action="{{ route('answer-update', $answer->id ) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <textarea name="answer" id="" cols="30" rows="10" style="width: 100%;">
                                </textarea>
                                <button class="button-blue">
                                    {{ __('Update Answer') }}
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
