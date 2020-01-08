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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        :root {
            --primary-color: #432E30;
            --primary-color-light: #8E7474;
            --accent-color: #FE6A6B;
            --accent-color-light: #FFE4E4;
            --accent-color-dark: #B94B4C;
            --white-color: #FAFBFC;
            --light-gray-color: #C6CBD1;
            --medium-gray-color: #959DA5;
            --dark-gray-color: #444D56;
            --bg-color: #F8F8FA;
            --code-bg-color: #F0E8E8;
        }

        html, body {
            padding: 0;
            margin: 0;
            font-family: 'Nunito Sans', sans-serif;
            background-color: white;
        }

        .wrapper {
            margin: 0 auto;
            width: 90%;
        }

        * {
            box-sizing: border-box;
        }

        /*.wrapper {*/
        /*    display: flex;*/
        /*    flex-grow: 1;*/
        /*}*/

        @media (max-width: 750px) {
            .wrapper {
                flex-direction: column;
            }
        }

        /* table */
        table {
            border-collapse: collapse;
            width: 100%;
            transition: color .3s ease-out;
            margin-bottom: 2rem;
        }

        table td, table th {
            border: 1px solid var(--code-bg-color);
            padding: 0.8rem;
            font-weight: 300;
        }

        table th {
            text-align: left;
            background-color: white;
            border-color: white;
            border-bottom-color: var(--code-bg-color);
        }

        table td:first-child {
            background-color: var(--bg-color);
            font-weight: 600;
        }

    </style>
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
                            <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" aria-labelledby="navbarDropdown"
                                   href="{{route('show-profile')}}">Profile</a>
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
    </main>
    <div class="wrapper">
        <section class="js-section">
            <div>
                <button style="width: 150px;" class="button-blue"
                        onclick="location.href='{{route('admin-add-user-form')}}'">Add User
                </button>
            </div>
            <hr>
            <h3 class="section__title">Manage User: Master User Page</h3>
            @foreach($users as $user)
                <table id="user">
                    <tr>
                        <td style="width: 10px;">#</td>
                        <td style="width: 80px;">Role</td>
                        <td style="width: 200px;">Email</td>
                        <td style="width: 120px;">FullName</td>
                        <td style="width: 60px;">Gender</td>
                        <td style="width: 300px;">Address</td>
                        <td style="width: 150px;">Profile Picture</td>
                        <td style="width: 150px;">DOB</td>
                        <td style="width: 150px;">Action</td>
                    </tr>
                    <tr>
                        <td style="width: 10px;">{{$user->id}}</td>
                        <td style="width: 80px;">{{$user->role}}</td>
                        <td style="width: 200px; word-break: break-word;">{{$user->email}}</td>
                        <td style="width: 120px; word-break: break-word;">{{$user->username}}</td>
                        <td style="width: 60px;">{{$user->gender}}</td>
                        <td style="width: 300px; word-break: break-word;">{{$user->address}}</td>
                        <td style="width: 150px;">
                            <img src="{{url('storage', $user->profile_picture)}}" alt="Profile Picture"
                                 style="width: 70px; height: 100px;">
                        </td>
                        <td style="width: 150px;">{{$user->birthday}}</td>
                        <td style="align-items: center; width: 150px;">
                            <button class="button-yellow"
                                    onclick="location.href='{{route('admin-update-user-form', $user->id)}}'">Edit
                            </button>
                            <hr>
                            <form action="user/{{$user->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="button-red">Delete</button>
                            </form>
                        </td>
                    </tr>
                </table>
            @endforeach
            <hr/>
        </section>
    </div>
</div>
<div style="display: flex; margin-bottom: 40px;">
    <div style="margin: 0 auto;">
        {{$users->appends(request()->input())->links()}}
    </div>
</div>
</body>
<footer class="bg-primary shadow-sm text-white footer" style="text-align: center;">
    &copy; 2019 Copyright Bjora.com
</footer>


</html>
