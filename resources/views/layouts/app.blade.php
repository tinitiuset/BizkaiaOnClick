<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100"> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-color navbar-expand-md fa-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="./img/LogoColor_e.png">
                   <!--{{ config('app.name', 'Laravel') }}-->
                </a>
                <button class="navbar-toggler" id="navbar-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="fas fa-bars fa-3x"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="navbar-link" aria-current="page" href="{{ url('/') }}">Inicio</a>
                          </li>
                          <li class="nav-item">
                            <a class="navbar-link" href="#">Agenda</a>
                          </li>
                          <li class="nav-item">
                            <a class="navbar-link" href="#">Envía tus eventos</a>
                          </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="navbar-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="navbar-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                            </li>
                        @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nombre }} {{ Auth::user()->apellidos }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
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
        <footer class="footer mt-auto navbar-color">
            <div class="container">
              <!-- Copyright -->
              <div class="row pt-2 text-center text-white">
                  <div class="col">
                    © 2022 Todos los derechos reservados. <a class="text-white text-decoration-none" href="https://mdbootstrap.com/">BizkaiaOnClick.com</a>
                  </div>
              </div>
              <div class="row pb-2 text-center text-light">
                  <div class="col">
                    Politica de privacidad | Términos de uso | Legalidad | <a class="text-white text-decoration-none" href="https://mdbootstrap.com/">Volver arriba</a>
                  </div>
              </div>
              <!-- Copyright -->
            </div>
    
        </footer>
    </div>
</body>
</html>
