Formulario de creación de categoria

<form action="{{ url('') }}" method="post" enctype="multipart/form-data">
    <label for="Nombre"> Nombre </label>
    <input type="text" name="Nombre">
    <br>
    <label for="Descripcion"> Descripción </label>
    <input type="text" name="Descripción">
    <br>
    <input type="submit" value="Enviar">
    <br>
</form>