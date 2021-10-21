<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KIT TOOL</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/pie.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('images/lo.png')}}" />

    
</head>
<body>
<A name="arriba"></A>
<div class="container">
<div class="container">
            <nav class="navbar navbar-expand-md fixed-top padtop bgNav">
                <a class="navbar-brand text-info" href="{{ url('/') }}">
                <img src="{{asset('images/lo.png')}}" width="50" height="50" alt="logo">
                KTC
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon">Menu</span>
                </button>
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                       
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @yield('migasdepan')
                        @guest
                        <li class="nav-item">
                                <a class="nav-link text-info" href="{{ route('users.create') }}">{{ __('Resgistrate') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-info" href="{{ route('login') }}">{{ __('Acceso') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-info" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Hola,{{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right text-info" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                                </div>
                            </li>
                        @endguest
                        
                    </ul>
                </div>
            
            </nav>
</div>
        
<div class="container pad">
             @yield('contenido')
</div>
</div>
    
    <div id="footer">
        <p>KTC<br><br><small>by</small> Rafael Gurdiel Sanchez - 2020</p>
    </div>
</body>
</html>
