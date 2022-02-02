@extends('layouts.app')

@section('title', 'PerfilAdmin')
@section('otrasClasesBody','body-degradado')
@section('content')
<div class="container">
          <!-- Si existe mensaje crea un div alert con botón de cierre -->
          @if (Session::has('mensaje'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ Session::get('mensaje') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif  
      <br>
    @if (count($errors)>0)<!-- Comprobamos si hay algún error -->

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error) <!-- Con un foreach recorremos todos los errores-->
            <li> {{ $error }} </li> <!-- Y los metemos en una lista -->
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ url('admin/user/editarperfil/'.auth()->user()->id) }}" method="post">
        @csrf
        {{ method_field('PATCH') }}
        <input type="hidden" name="id" value="{{ auth()->user()->id }}"><!-- Esto hace falta para saber el id le pasamos -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-xs-8">
                    <div class="card cardPersonalizada">
                        <div class="card-header card-registro text-center">
            
                <h1 class="initialism text-center white">editar perfil</h1>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="white" for="usuario"> Usuario: </label>
                    <input type="text"  class="form-control"  name="usuario"
                    value="{{ auth()->user()->usuario }}">
                
                </div>
                <div class="form-group">
                    <label class="white" for="nombre"> Nombre: </label>
                    <input type="text" class="form-control" name="nombre"
                    value="{{ auth()->user()->nombre }}">  
                </div>
                <div class="form-group">
                    <label class="white" for="apellidos"> Apellidos: </label>
                    <input type="text"  class="form-control"  name="apellidos"
                    value="{{ auth()->user()->apellidos }}">
      
                </div>
                <div class="form-group">
                    <label class="white" for="email"> Email: </label>
                    <input type="email" class="form-control" name="email"
                    value="{{ auth()->user()->email }}">  
                </div>
                <div class="form-group">
                    <label class="white" for="fechaNac"> Fecha de nacimiento: </label>
                    <input type="date"  class="form-control"  name="fechaNac"
                    value="{{ auth()->user()->fechaNac }}">
             
                </div>
                <div class="form-group">
                    <label class="white" for="nombre"> Telefono: </label>
                    <input type="text" class="form-control" name="telefono"
                    value="{{ auth()->user()->telefono }}">  
                </div>
                <div class="form-group">
                    <label class="white" for="nombre"> Contraseña: </label>
                    <input type="password" class="form-control" name="password">
              
                    
                </div>
                <div class="form-group">
                    <label class="white" for="nombre"> Confirmar Contraseña: </label>
                    <input type="password" class="form-control" name="password_confirmation">
              
                </div>
                <br>
                <input class="btn bg-magenta white" type="submit" value="Guardar cambios">

    
            </div>
        </div>
    </form>
</div>
@endsection
