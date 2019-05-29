<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nelson branch of Independent Berry Growers New Zealand') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css').'?'.time() }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-xl navbar-light navbar-laravel">
            <div class="container">
                <a class="text-danger display-4" href="{{ url('/') }}">
                    <small><i class="fab fa-raspberry-pi"></i></small>
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
                        <li class="nav-item mr-2">
                            <a class="nav-link text-red" href="./#/berries" :class="{'text-danger': $route.name=='berries'}"><i class="fas fa-holly-berry mr-2"></i>Berries</a>
                        </li>
                        <li class="nav-item mr-2">
                            <a class="nav-link" href="./#/marketplace" :class="{'text-danger': $route.path.match(/marketplace|item/)}"><i class="fas fa-shopping-basket mr-2"></i>Marketplace</a>
                        </li>
                        <li class="nav-item mr-2">
                            <a class="nav-link" href="./#/growers" :class="{'text-danger': $route.name=='growers'}"><i class="fas fa-user-ninja mr-2"></i>Growers</a>
                        </li>
                        
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item ml-4">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <router-link class="nav-link" to="/dashboard" :class="{'text-danger': $route.path.match(/dashboard|addnew|auctions|info|orders/)}"><i class="fas fa-columns mr-2"></i>Dashboard</router-link>
                            </li>
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

        <footer class=" container text-center pt-3 mt-2 mb-5 border-top border-light text-secondary">
            &copy;2019 Nelson branch of Independent Berry Growers New Zealand
        </footer>
    </div>
    
    <!-- JavaScripts -->
    <script src="{{asset('js/manifest.js')}}"></script>
    <script src="{{asset('js/vendor.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
    <script>var socket = io(':6001')</script>
    @stack('scripts')
</body>
</html>
