<!doctype html>
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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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
                        @if(auth()->check() && auth()->user()->is_admin == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.narudzbe') }}">Narudžbe</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dodajKategoriju') }}">Dodaj Kategoriju</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.store') }}">Dodaj Artikl</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.sviArtikli') }}">Svi Artikli</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.korisnici') }}">Korisnici</a>
                            </li>
                            @else
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Muško
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Dugi rukav Majice</a>
                                    <a class="dropdown-item" href="#">Kratki rukav Majice</a>
                                    <a class="dropdown-item" href="#">Hlaće</a>
                                    <a class="dropdown-item" href="#">Trenirka</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Žensko
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Dugi rukav Majice</a>
                                    <a class="dropdown-item" href="#">Kratki rukav Majice</a>
                                    <a class="dropdown-item" href="#">Hlaće</a>
                                    <a class="dropdown-item" href="#">Trenirka</a>
                                    <a class="dropdown-item" href="#">Tenisice</a>
                                    <a class="dropdown-item" href="#">Haljine</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Ostalo
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Čarape</a>
                                    <a class="dropdown-item" href="#">Naočale</a>
                                    <a class="dropdown-item" href="#">Šalovi</a>
                                </div>
                            </div>
                        @endif
                        <li class="nav-item">

                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @if(auth()->check() && auth()->user()->is_admin == 0)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('kosara.index') }}">
                                    Košara
                                    @auth
                                        <small class="bg-dark p-1 rounded text-light">{{ \Cart::session(auth()->id())->getTotalQuantity() }}</small>
                                    @endauth
                                </a>
                            </li>
                        @endif

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
