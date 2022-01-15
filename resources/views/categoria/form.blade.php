    <h1> {{ $modo }} categoría </h1>

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
        <label for="nombre"> Nombre </label>
        <input type="text"  class="form-control"  name="nombre"
        value="{{ isset($categoria->nombre)?$categoria->nombre:old('nombre') }}">
        <!-- con el método old le indicamos que en caso de error mantenga el registro-->
    </div>
    <div class="form-group">
        <label for="descripcion"> Descripción </label>
        <input type="text" class="form-control" name="descripcion"
         value="{{ isset($categoria->descripcion)?$categoria->descripcion:old('descripcion') }}">  
    </div>
    <br>
    <!-- Agregamos la variable $modo para diferenciar entre crear y editar-->
    <input class="btn btn-success" type="submit" value="{{ $modo }} datos">

    <a class="btn btn-primary" href="{{ url('categoria')}}"> Volver </a>

    <br>                                    