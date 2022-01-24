<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100"> 
<head>
    @include('layouts.header')
    @yield('estilosPersonalizados')
    <title>@yield('title')</title>
</head>
<!-- yield se usa para añadir elementos, en este caso una clase -->
<body class="h-100 @yield('otrasClasesBody')">
    <div id="app" class="h-100 d-flex flex-column">
        {{-- <nav class="navbar navbar-color navbar-expand-md fa-lg">
            <div class="container">
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
                                    {{ Auth::user()->usuario }}
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

                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="./img/LogoColor_e.png">
                   <!--{{ config('app.name', 'Laravel') }}-->
                </a>

            </div>
        </nav> --}}

        {{-- <nav class="navbar navbar-expand-lg navbar-color">
            <div class="container-fluid">
              <button class="navbar-toggler" id="navbar-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}" :click="abrirMenu">
                <i class="fas fa-bars fa-2x"></i>
              </button>
              <a class="navbar-brand" id="logo" href="{{ url('/') }}">
                <img class="logo-movil" src="{{URL::asset('/img/LogoColor_e.png')}}">
               <!--{{ config('app.name', 'Laravel') }}-->
              </a>
              <a class="" id="iconoUsuario" href="#"><img src="/img/usuario.png" alt="" class="img-fluid d-block h-50 w-50"></a>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item text-center fs-1">
                    <a class="nav-link active text-white text-center" aria-current="page" href="{{ url('/') }}">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white text-center fs-1" href="#">Agenda</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white text-center fs-1" href="#">Envía tus eventos</a>
                  </li>
                </ul>
              </div>
              
          
            </div>
        </nav> --}}

        @auth
      
        <menuusuario usuario="{{ auth()->user() }}" tipo="{{auth()->user()->tipo}}"></menuusuario>

        @else

        <menuusuario></menuusuario>

        @endauth



        <main class="@yield('otrasClasesMain')">
            @yield('content')
        </main>
        <footer class="footer mt-auto navbar-color">
            <div class="container">
              <!-- Copyright -->
              <div class="row pt-2 text-center text-white">
                  <div class="col">
                    © 2022 Todos los derechos reservados. <a class="text-white text-decoration-none texto-degradado" href="{{ url('/') }}">BizkaiaOnClick.com</a>
                  </div>
              </div>
              <div class="row pb-2 text-center text-white">
                  <div class="col">
                    Politica de privacidad | Términos de uso | Legalidad | <a class="text-white text-decoration-none texto-degradado" href="#app">Volver arriba</a>
                  </div>
              </div>
              <!-- Copyright -->
            </div>
    
        </footer>
    </div>
</body>
</html>
