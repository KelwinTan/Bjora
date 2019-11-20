<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ url('/home') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" aria-labelledby="navbarDropdown"
                                   href="{{route('show-profile', ['id' => Auth::user()->id])}}">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @include('util.time')
    <main class="py-4">
        @yield('content')
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
                                    <button class="button-blue" onclick="location.href='{{route('show-update-profile')}}'">Update Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <hr>
    <h1 style="text-align: center;">Other Users</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex;">
                            <div style="width: 100px; margin-right: 30px;">
                                <img src="{{url('storage', Auth::user()->profile_picture)}}" alt="Profile Picture"
                                     style="width: 70px; height: 100px;">
                            </div>
                            <div style="width: 450px;">
                                <h1>{{Auth::user()->username}}</h1>
                                <p style="margin: 0px; padding: 0px;">{{Auth::user()->email}}</p>
                                <p style="margin: 0px; padding: 0px;">{{Auth::user()->address}}</p>
                                <p style="margin: 0px; padding: 0px;">{{Auth::user()->birthday}}</p>
                            </div>
                            <div style="width: 150px;">
                                <button class="button-blue" onclick="location.href='{{route('show-update-profile')}}'">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<footer class="bg-primary shadow-sm text-white footer" style="text-align: center;">
    &copy; 2019 Copyright Bjora.com
</footer>


</html>