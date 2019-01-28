<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.css">
    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> --}}
</head>
<body>
    {{-- <div class="se-pre-con"></div> --}}
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-laravel"> --}}
        <div class="container-fluid">
            {{-- <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button> --}}
            <div class="c-navbar fixed pin-l pin-t pin-b h-full bg-black">
                <div class="c-title flex items-center justify-between">
                    <h2 class="c-title__head text-white font-bold tracking-wide text-6xl m-0 p-2 px-8">am<span class="text-yellow-d">az</span>in
                    </h2>
                    <a href="#/" class="text-4xl inline-block px-8 pt-2 text-white">&#128276;</a>
                </div>
                <!-- Left Side Of Navbar -->
                <ul class="c-lists list-reset my-6">
                    @if (Auth::check())
                        <li class="c-lists__list"><a href="/" class="c-lists__link  no-underline text-yellow px-6 py-4 block outline-none">Dashboard</a></li>
                        <li class="c-lists__list"><a href="/projects" class="c-lists__link  no-underline text-yellow px-6 py-4 block outline-none">Projects</a></li>
                        <li class="c-lists__list"><a href="/users" class="c-lists__link  no-underline text-yellow px-6 py-4 block outline-none">Users</a></li>
                    @endif
                    @guest
                        <li class="c-lists__list">
                            <a class="c-lists__link  no-underline text-yellow px-6 py-4 block outline-none" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="c-lists__list">
                                <a class="c-lists__link  no-underline text-yellow px-6 py-4 block outline-none" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="dropdown menu-drop c-lists__list">
                            <a id="navbarDropdown" class="dropdown-toggle  c-lists__link no-underline text-yellow px-6 py-4 block outline-none" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret text-yellow"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right p-0 m-0" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item  c-lists__link c-lists--drop-link no-underline text-black px-6 py-4 block outline-none" href="{{ route('logout') }}"
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
            <main class="py-4">
                <div class="c-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script type="text/javascript">
        // window.addEventListener('load', function() {
        //     // Animate loader off screen
        //     $(".se-pre-con").fadeOut("fast");;
        // });
        // function init() {
        //     $('.c-lists__link').click(function () {
        //         if (!$('.c-lists__link').hasClass('active')) {
        //             $('.c-lists__link').removeClass('active');
        //             // $('.js-seight-menu').removeClass('seight-bg');
        //         }

        //         // $(this).toggleClass('seight-bg');
        //         $(this).toggleClass('active');
        //     });
        // };

        // init();
    </script>
</body>
</html>
