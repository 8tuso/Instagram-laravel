<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

   

</head>
<body>
    <div id="app" class="">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm d-flex flex-column justify-content-start position-fixed" style="height:100vh; width:16%; min-width:250px;">
            <div class="container d-flex flex-column" style="box-sizing:border-box;">
                <a class="navbar-brand d-flex" href="{{ url('/') }}">
                    <div><img src="/svg/instagram.svg" style="height:20px; border-right: 1px solid #333; margin-top:2px;" class="pe-3 mt-1"></div>
                    <div class="ps-3">Instagram</div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="d-flex w-100 me-4 mt-5" style=" float:left;">
                    <ul style="list-style: none;">
                        <li class="my-4">
                            <a href="{{ url('/') }}" class="d-flex flex-row text-decoration-none" style="color:black; font-weight:bold;">
                                <img class="me-3" style="max-width:34px;" src="/svg/home.svg">
                                <span class="d-flex align-items-center my-3" style="margin-top:8px;">Home</span>
                            </a>
                        </li>
                        <li class="d-flex flex-row my-4">
                            <a href="" class="d-flex flex-row text-decoration-none" style="color:black; font-weight:bold;">
                                <img class="me-3" style="max-width:34px;" src="/svg/search.svg">
                                <span class="d-flex align-items-center my-3" style="margin-top:8px;">Search</span>
                            </a>
                        </li>
                        <li class="d-flex flex-row my-4">
                            <a href="" class="d-flex flex-row text-decoration-none" style="color:black; font-weight:bold;">
                                <img class="me-3" style="max-width:34px;" src="/svg/Explore.svg">
                                <span class="d-flex align-items-center my-3" style="margin-top:8px;">Explore</span>
                            </a>
                        </li>
                        <li class="d-flex flex-row my-4">
                            <a href="" class="d-flex flex-row text-decoration-none" style="color:black; font-weight:bold;">
                                <img class="me-3" style="max-width:34px;" src="/svg/messages.svg">
                                <span class="d-flex align-items-center my-3" style="margin-top:8px;">Messages</span>
                            </a>
                        </li>
                        <li class="d-flex flex-row my-4">
                            <a href="" class="d-flex flex-row text-decoration-none" style="color:black; font-weight:bold;">
                                <img class="me-3" style="max-width:34px;" src="/svg/notifications.svg">
                                <span class="d-flex align-items-center my-3" style="margin-top:8px;">Notifications</span>
                            </a>
                        </li>
                        <li class="d-flex flex-row my-4">
                            <a href="/p/create" class="d-flex flex-row text-decoration-none" style="color:black; font-weight:bold;">
                                <img class="me-3" style="max-width:34px;" src="/svg/create.svg">
                                <span class="d-flex align-items-center my-3" style="margin-top:8px;">Create</span>
                            </a>
                        </li>
                        <li class="d-flex flex-row my-4">
                            @guest
                                @if (Route::has('login'))
                                <a href="/profile/" class="d-flex flex-row text-decoration-none" style="color:black; font-weight:bold;">
                                   
                                @endif
                                @else
                                    <a href="/profile/{{Auth::user()->profile->id}}" class="d-flex flex-row text-decoration-none" style="color:black; font-weight:bold;">
                                        <img src="/storage/{{Auth::user()->profile->image}}" class="me-3 rounded-circle" style="max-width:45px;" alt="">
                                        <span class="d-flex align-items-center " style="margin-top:4px;">Profile</span>
                                    @endguest

                            </a>
                        </li>
                    </ul>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
