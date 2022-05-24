@extends('layouts.app')

@section('otrasClasesBody','body-degradado')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card cardPersonalizada margin-110">
                <div class="card-header text-white text-center fs-3 fw-bold">VERIFICA TU CORREO ELECTRÓNICO</div>

                <div class="card-body text-white text-center fs-5">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <div>

                        Antes de poder disfrutar de las ventajas de ser un usuario registrado debe verificar su cuenta confirmando su correo electrónico con el enlace de verificación que le fue enviado. En caso de no haber recibido el enlace de verificacion, intentelo de nuevo pulsando el boton que tiene justo debajo.

                    </div>

                    <div class="w-100 text-center">
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn bg-magenta white btn-lg btn-login mt-4 w-75">Volver a enviar</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection