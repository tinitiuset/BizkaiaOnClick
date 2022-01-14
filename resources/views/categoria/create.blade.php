Formulario de creación de categoria

<form action="{{ url('/categoria') }}" method="post" enctype="multipart/form-data">
    @csrf

    <label for="nombre"> Nombre </label>
    <input type="text" name="nombre">
    <br>
    <label for="descripcion"> Descripción </label>
    <input type="text" name="descripcion">
    <br>
    <input type="submit" value="Guardar datos">
    <br>
</form>