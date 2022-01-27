@extends ('adminlte::page')
@include('layouts.header')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8 col-xs-8">
            <div class="card cardPersonalizada">
                <div class="card-header card-registro text-center">
                    <p>Detalles Perfil</p>
                </div>
                <div class="card-body">
                    <form action="{{ url('/perfil') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <!-- Añadimos la variable modo para diferenciar entre crear y editar-->

                        <!--USUARIO USUARIO-->
                        <div class="form-group">
                            <label for="usuario"> Usuario: </label>
                            <input id="usuario" placeholder="Usuario" type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario" value="{{auth()->user()->usuario}}" autocomplete="usuario" autofocus>

                            @error('usuario')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!--NOMBRE USUARIO-->
                        <div class="form-group">
                            <label for="nombre"> Nombre: </label>
                            <input id="nombre" placeholder="Nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{auth()->user()->nombre}}" autocomplete="nombre">

                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--APELLIDOS USUARIO-->
                        <div class="form-group">
                            <label for="apellidos"> Apellidos: </label>
                            <input id="apellidos" placeholder="Apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{auth()->user()->apellidos}}" autocomplete="apellidos">

                            @error('apellidos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!--E-MAIL USUARIO-->
                        <div class="form-group">
                            <label for="email"> Email: </label>
                            <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{auth()->user()->email}}" autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                        </div>

                        <!--TELEFONO USUARIO-->
                        <div class="form-group">
                            <label for="telefono"> Teléfono: </label>
                            <input id="telefono" placeholder="Teléfono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{auth()->user()->telefono}}" autocomplete="telefono">

                            @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="usuario"> Fecha de nacimiento: </label>
                            <input type="date"  class="form-control"  name="fechaNac"
                            value="{{auth()->user()->fechaNac}}"> 
                        </div>

                        <div class="row mb-0">
                            <div class="d-grid gap-2 col-10 mx-auto">
                                <button type="submit" class="btn bg-magenta white btn-lg btn-login">
                                    {{ __('Etitar campos') }}
                                </button>
                                {{-- <br>
                                    <!-- Agregamos la variable $modo para diferenciar entre crear y editar-->
                                    <input class="btn btn-success" type="submit" value="{{ $modo }} usuario">

                                    <a class="btn btn-primary" href="{{ url('admin/user')}}"> Volver </a>

                                    <br>    --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 

</div>
@endsection