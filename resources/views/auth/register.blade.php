@extends('layouts.app')

@section('otrasClasesBody','body-degradado')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-xs-8">
            <div class="card cardPersonalizada">
                <div class="card-header card-registro text-center">
                    <a class="card-link white text-uppercase text-decoration-none link-personalizado " href="{{ url('register')}}">Crear cuenta</a>
                    <a class="card-link white text-uppercase text-decoration-none link-personalizado " href="{{ url('login')}}">Iniciar sesión</a>
                </div>


                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!--USUARIO USUARIO-->
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-10">
                                <input id="usuario" placeholder="Usuario" type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario" value="{{ old('usuario') }}" autocomplete="usuario" autofocus>

                                @error('usuario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!--NOMBRE USUARIO-->
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-10">
                                <input id="nombre" placeholder="Nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" autocomplete="nombre">

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--APELLIDOS USUARIO-->
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-10">
                                <input id="apellidos" placeholder="Apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" autocomplete="apellidos">

                                @error('apellidos')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--E-MAIL USUARIO-->
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-10">
                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--TELEFONO USUARIO-->
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-10">
                                <input id="telefono" placeholder="Teléfono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" autocomplete="telefono">

                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-10">
                                <input id="password" placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                <div class="small text-muted mt-2">Mínimo 8 carácteres</div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-10">
                                <input id="password-confirm" placeholder="Confirmar contraseña" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="d-grid gap-2 col-10 mx-auto">
                                <button type="submit" class="btn bg-magenta white btn-lg btn-login">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
