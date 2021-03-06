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
<div class="form-group">
    <label for="apellidos"> Apellidos: </label>
    <input type="text"  class="form-control"  name="apellidos"
    value="{{ isset($usuario->apellidos)?$usuario->apellidos:old('apellidos') }}">
    <!-- con el método old le indicamos que en caso de error mantenga el registro-->
</div>
<div class="form-group">
    <label for="email"> Email: </label>
    <input type="email" class="form-control" name="email"
     value="{{ isset($usuario->email)?$usuario->email:old('email') }}">  
</div>
<div class="form-group">
    <label for="fechaNac"> Fecha de nacimiento: </label>
    <input type="date"  class="form-control"  name="fechaNac"
    value="{{ isset($usuario->fechaNac)?$usuario->fechaNac:old('fechaNac') }}">
    <!-- con el método old le indicamos que en caso de error mantenga el registro-->
</div>
<div class="form-group">
    <label for="tipo"> Tipo: </label>
    <select name="tipo" id="">
            
        @if ($modo == "Editar")
            
            @if ($usuario->tipo == "administrador")

                <option value="usuario">Usuario</option>    
                <option value="administrador" selected>Administrador</option>
                
            @else

                <option value="usuario" selected>Usuario</option>
                <option value="administrador">Administrador</option>

            @endif

        @else
            <option value="usuario" selected>Usuario</option>
            <option value="administrador">Administrador</option>
            
        @endif

        
        
    </select>
</div>
<div class="form-group">
    <label for="nombre"> Telefono: </label>
    <input type="text" class="form-control" name="telefono"
     value="{{ isset($usuario->telefono)?$usuario->telefono:old('telefono') }}">  
</div>
<div class="form-group">
    <label for="nombre"> Contraseña: @if ($modo == "Editar") (Si dejas este campo vacio se preservara la anterior contraseña del usuario) @endif</label>
    <input type="password" class="form-control" name="password">
     {{-- value="{{ isset($usuario->password)?$usuario->password:old('password') }}">   --}}
     
</div>
<div class="form-group">
    <label for="nombre"> Confirmar Contraseña: @if ($modo == "Editar") (Si dejas este campo vacio se preservara la anterior contraseña del usuario) @endif</label>
    <input type="password" class="form-control" name="password_confirmation">
     {{-- value="{{ isset($usuario->password)?$usuario->password:old('password_confirmation') }}">   --}}
</div>
<br>
<!-- Agregamos la variable $modo para diferenciar entre crear y editar-->
<input class="btn btn-success" type="submit" value="{{ $modo }} usuario">

<a class="btn btn-primary" href="{{ url('admin/user')}}" onclick="return confirm('Seguro que quieres regresar? Se perderan todos los cambios realizados')"> Volver </a>

<br>                                    