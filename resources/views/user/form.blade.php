<h1> {{ $modo }} usuario </h1>

@if (count($errors)>0)<!-- Comprobamos si hay algún error -->

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error) <!-- Con un foreach recorremos todos los errores-->
            <li> {{ $error }} </li> <!-- Y los metemos en una lista -->
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="usuario"> Usuario: </label>
    <input type="text"  class="form-control"  name="usuario"
    value="{{ isset($usuario->usuario)?$usuario->usuario:old('usuario') }}">
    <!-- con el método old le indicamos que en caso de error mantenga el registro-->
</div>
<div class="form-group">
    <label for="nombre"> Nombre: </label>
    <input type="text" class="form-control" name="nombre"
     value="{{ isset($usuario->nombre)?$usuario->nombre:old('nombre') }}">  
</div>
<br>
<!-- Agregamos la variable $modo para diferenciar entre crear y editar-->
<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{ url('user')}}"> Volver </a>

<br>                                    