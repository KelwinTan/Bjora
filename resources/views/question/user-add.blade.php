@extends('layouts.app')

@section('content')
    <div class="container" style="padding-bottom: 40px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Question') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('member-add-question') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="address"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Question') }}</label>

                                <div class="col-md-6">
                                    <textarea style="width: 100%; height: 200px;" name="question"
                                              placeholder="Insert Your Question...">{{old('question')}}</textarea>
                                    @error('question')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col-md-4 col-form-label text-md-right"></div>
                                <div class="col-md-6">
                                    <select name="topic" id="" style="width: 100%;">
                                        <option selected value="">Choose Topic</option>
                                        @foreach($topics as $topic)
                                            <option value="{{$topic->id}}">{{$topic->topic_name}}</option>
                                        @endforeach


                                    </select>

                                    @error('question')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Question') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

