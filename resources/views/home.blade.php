@extends('layouts.app')

@section('content')

    <div class="container" style="margin-bottom: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('util.search')
                @foreach($questions as $question)
                    @include('question.boilerplate')
                @endforeach
                <div style="display: flex; margin: 10px;">
                    <div style="margin: 0 auto;">
                        {{$questions->appends(request()->input())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
