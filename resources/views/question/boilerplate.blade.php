<div class="card">
    {{--                <div class="card-header">{{$echo}}</div>--}}

    <div class="card-body">
        {{--                    @if (session('status'))--}}
        {{--                        <div class="alert alert-success" role="alert">--}}
        {{--                            {{ session('status') }}--}}
        {{--                        </div>--}}
        {{--                    @endif--}}
        <p style="color: lightgrey;">{{$question->topic->topic_name}}</p>
        <div style="display: flex;">
            <div style="width: 100px; margin: 20px;">
                <img style="width: 70px; height: 100px;" src="{{url('storage', $question->user->profile_picture)}}" alt="profile picture">
            </div>
            <div>
                <p>{{$question->question}}</p>
                <p style="color: rgba(52, 144, 220, 0.9) !important;">{{$question->user->username}}</p>
                <p style="color: darkgrey;">Created At: {{$question->created_at}}</p>
                <button>Answer</button>
            </div>

        </div>

    </div>
</div>
