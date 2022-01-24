@extends('layouts.app')

@section('otrasClasesBody','body-degradado')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-xs-8">
            <div class="card cardPersonalizada">
                <div class="card-header card-registro text-center">
                    <a class="card-link white text-uppercase text-decoration-none link-personalizado " href="{{ url('register')}}">Crear cuenta</a>
                    <a class="card-link white text-uppercase text-decoration-none link-personalizado " href="{{ url('login')}}">Inciciar sesión</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-0">
                            <label for="email" class="col-form-label white">{{ __('Correo electrónico') }}</label>

                            <div class="col lg-10 col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <label for="password" class=" col-form-label white">{{ __('Contraseña') }}</label>

                            <div class="col lg-10 col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label white" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="d-grid gap-2 col-10 mx-auto">
                                <button type="submit" class="btn bg-magenta white btn-lg btn-login">
                                    {{ __('Iniciar sesión') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link white magenta-hover" href="{{ route('password.request') }}">
                                        {{ __('¿Has olvidado la contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
