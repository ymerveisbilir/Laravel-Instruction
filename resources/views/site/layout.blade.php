<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Kitabevi</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/home">
                  Kitabevi
                </a>
             
                <a href="/sepet"><svg width="22.247" height="26.842" viewBox="0 0 22.247 26.842"> <path d="M188.678,93.471h16.834a2.2,2.2,0,0,0,2.181-2.517l-.112-15.787a2.215,2.215,0,0,0-2.18-1.889h-3.564V71.571c0-2.174-2.128-3.942-4.742-3.942s-4.742,1.768-4.742,3.942v1.707h-3.562a2.216,2.216,0,0,0-2.18,1.889L186.5,90.954a2.2,2.2,0,0,0,2.181,2.517Zm4.243-21.9c0-1.86,1.875-3.374,4.174-3.374s4.174,1.514,4.174,3.374v1.707h-8.348ZM187.06,91.035l.112-15.788a1.642,1.642,0,0,1,1.618-1.4H205.4a1.642,1.642,0,0,1,1.618,1.4l.112,15.788a1.635,1.635,0,0,1-1.617,1.868H188.678a1.635,1.635,0,0,1-1.618-1.868Z" transform="translate(-185.973 -67.129)" stroke="#fff" stroke-width="1"></path></svg><span style="color: white;
                    display: inline-block;
                    vertical-align: top;
                    line-height: normal;
                    text-transform: uppercase;
                    margin-top: 6px;">SEPET</span>
                </a>

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
                            <li class="nav-item dropdown" >
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
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
