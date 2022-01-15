    <h1> {{ $modo }} categoría </h1>
    <label for="nombre"> Nombre </label>
    <input type="text" value="{{ isset($categoria->nombre)?$categoria->nombre:'' }}" name="nombre">
    <br>
    <label for="descripcion"> Descripción </label>
    <input type="text" value="{{ isset($categoria->descripcion)?$categoria->descripcion:'' }}" name="descripcion">
    <br>
    <!-- Agregamos la variable $modo para diferenciar entre crear y editar-->
    <input type="submit" value="{{ $modo }} datos">

    <a href="{{ url('categoria')}}"> Volver </a>

    <br>                                    