@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('util.search')
                <div class="card">
                    {{--                <div class="card-header">{{$echo}}</div>--}}

                    <div class="card-body">
                        {{--                    @if (session('status'))--}}
                        {{--                        <div class="alert alert-success" role="alert">--}}
                        {{--                            {{ session('status') }}--}}
                        {{--                        </div>--}}
                        {{--                    @endif--}}
                        @foreach($questions as $question)
                            {{$question->question}}
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
