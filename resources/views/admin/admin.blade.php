@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Manage User</h5>
                    <p class="card-text">
                        Manage Master User Page
                    </p>
                    <a href="{{Route('admin-manage-user')}}" class="btn btn-primary">Go</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Manage Question</h5>
                    <p class="card-text">
                        Manage Master Question Page
                    </p>
                    <a href="{{Route('admin-manage-question')}}" class="btn btn-primary">Go</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Manage Topic</h5>
                    <p class="card-text">
                        Manage Master Topic Page
                    </p>
                    <a href="{{Route('admin-manage-topic')}}" class="btn btn-primary">Go</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Global Home</h5>
                    <p class="card-text">
                        Show the Global Home page that is accessible to all users
                    </p>
                    <a href="{{Route('home')}}" class="btn btn-primary">Go</a>
                </div>
            </div>
        </div>
    </div>

@endsection
