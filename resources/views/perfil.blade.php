@extends ('adminlte::page')

@section('title', 'PerfilAdmin')
@section('content')
<div class="container">
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
        <input type="hidden" name="id" value="{{ auth()->user()->id }}">
        <div class="card">
            <div class="card-header bg-magenta white ">
                <h1 class="initialism text-center">detalles perfil</h1>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="usuario"> Usuario: </label>
                    <input type="text"  class="form-control"  name="usuario"
                    value="{{ auth()->user()->usuario }}">
                    <!-- con el método old le indicamos que en caso de error mantenga el registro-->
                </div>
                <div class="form-group">
                    <label for="nombre"> Nombre: </label>
                    <input type="text" class="form-control" name="nombre"
                    value="{{ auth()->user()->nombre }}">  
                </div>
                <div class="form-group">
                    <label for="apellidos"> Apellidos: </label>
                    <input type="text"  class="form-control"  name="apellidos"
                    value="{{ auth()->user()->apellidos }}">
                    <!-- con el método old le indicamos que en caso de error mantenga el registro-->
                </div>
                <div class="form-group">
                    <label for="email"> Email: </label>
                    <input type="email" class="form-control" name="email"
                    value="{{ auth()->user()->email }}">  
                </div>
                <div class="form-group">
                    <label for="fechaNac"> Fecha de nacimiento: </label>
                    <input type="date"  class="form-control"  name="fechaNac"
                    value="{{ auth()->user()->fechaNac }}">
                    <!-- con el método old le indicamos que en caso de error mantenga el registro-->
                </div>
                <div class="form-group">
                    <label for="nombre"> Telefono: </label>
                    <input type="text" class="form-control" name="telefono"
                    value="{{ auth()->user()->telefono }}">  
                </div>
                <div class="form-group">
                    <label for="nombre"> Contraseña: (Si dejas este campo vacio se preservara la anterior contraseña del usuario)</label>
                    <input type="password" class="form-control" name="password">
                    {{-- value="{{ isset($usuario->password)?$usuario->password:old('password') }}">   --}}
                    
                </div>
                <div class="form-group">
                    <label for="nombre"> Confirmar Contraseña: (Si dejas este campo vacio se preservara la anterior contraseña del usuario)</label>
                    <input type="password" class="form-control" name="password_confirmation">
                     {{-- value="{{ isset($usuario->password)?$usuario->password:old('password_confirmation') }}">   --}}
                </div>
                <br>
                <input class="btn bg-magenta white" type="submit" value="Guardar cambios">

    
            </div>
        </div>
    </form>
</div>
@endsection
<!-- Añadimos este section para cargar hojas de estilo -->
@section('css') 
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/estilos.css">
@stop