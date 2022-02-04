@extends('layouts.app')

@section('otrasClasesBody','body-degradado')

@section('content')
<div class="container" width="100%">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-xs-8">
            <div class="card cardPersonalizada margin-110">
                <div class="card-header white text-center text-uppercase">{{ __('Renovar Contraseña') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{-- {{ session('status') }} --}}
                            Hemos enviado a tu correo el mail para restablecer tu contraseña!
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-0">
                            <label for="email" class="col-form-label white">{{ __('Correo electronico de tu cuenta:') }}</label>

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
                            <div class="d-grid gap-2 col-10 mx-auto">
                                <button type="submit" class="btn bg-magenta white btn-lg btn-login mt-4">
                                    {{ __('Enviar correo') }}
                                </button>
                                <a href="/login" class="btn bg-danger white btn-lg btn-login mt-4">Regresar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
