    <label for="nombre"> Nombre </label>
    <input type="text" value="{{ $categoria->nombre }}" name="nombre">
    <br>
    <label for="descripcion"> Descripción </label>
    <input type="text" value="{{ $categoria->descripcion }}" name="descripcion">
    <br>
    <input type="submit" value="Guardar datos">
    <br>