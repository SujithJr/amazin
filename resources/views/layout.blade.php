<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Amazin</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.css">
    </head>
<body>
    <section class="s-main">
        <div class="c-navbar fixed pin-l pin-t pin-b h-full bg-black">
            <div class="c-title">
                <h2 class="c-title__head text-white text-4xl m-0 p-2 px-6">am<span class="text-yellow">az</span>in</h2>
            </div>
            <ul class="c-lists list-reset">
                <li class="c-lists__list"><a href="/" class="c-lists__link no-underline text-yellow px-6 py-4 block outline-none">Dashboard</a></li>
                <li class="c-lists__list"><a href="/tasks" class="c-lists__link no-underline text-yellow px-6 py-4 block outline-none">Tasks</a></li>
                <li class="c-lists__list"><a href="/users" class="c-lists__link no-underline text-yellow px-6 py-4 block outline-none">Users</a></li>
                <li class="c-lists__list"><a href="/logout" class="c-lists__link no-underline text-yellow px-6 py-4 block outline-none">Logout</a></li>
                @guest
                    <li class="c-lists__list"><a class="c-lists__link no-underline text-yellow px-6 py-4 block outline-none" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @if (Route::has('register'))
                        <li class="nav-item"><a class="c-lists__link no-underline text-yellow px-6 py-4 block outline-none" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                @else
                    <li class="nav-item dropdown c-lists__list">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle c-lists__link no-underline text-yellow px-6 py-4 block outline-none" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        <div class="c-wrapper ml-10">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>


    {{-- <script src="/js/app.js"></script>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
</head>
<body>
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->


                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div> --}}
    <section class="s-main">
        <div class="c-navbar fixed pin-l pin-t pin-b h-full bg-black">
            <div class="c-title">
                <h2 class="c-title__head text-white text-4xl m-0 p-2 px-6">am<span class="text-yellow">az</span>in</h2>
            </div>
            <ul class="c-lists list-reset">
                <li class="c-lists__list"><a href="/" class="c-lists__link no-underline text-yellow px-6 py-4 block outline-none">Dashboard</a></li>
                <li class="c-lists__list"><a href="/tasks" class="c-lists__link no-underline text-yellow px-6 py-4 block outline-none">Tasks</a></li>
                <li class="c-lists__list"><a href="/users" class="c-lists__link no-underline text-yellow px-6 py-4 block outline-none">Users</a></li>
                <li class="c-lists__list"><a href="/logout" class="c-lists__link no-underline text-yellow px-6 py-4 block outline-none">Logout</a></li>
                @guest
                    <li class="c-lists__list"><a class="c-lists__link no-underline text-yellow px-6 py-4 block outline-none" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @if (Route::has('register'))
                        <li class="nav-item"><a class="c-lists__link no-underline text-yellow px-6 py-4 block outline-none" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                @else
                    <li class="nav-item dropdown c-lists__list">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle c-lists__link no-underline text-yellow px-6 py-4 block outline-none" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        <div class="c-wrapper ml-10">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
</body>
</html>

