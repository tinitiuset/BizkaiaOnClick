Formulario de creación de eventos
<form action="" method="post" enctype="multipart/form-data">
<input type="text" name="titulo">
<input type="text" name="descripcion">
<input type="date" name="fechaInicio">
<input type="date" name="fechaFin">
<input type="time" name="hora">
<input type="float" name="precio">
<input type="text" name="direccion">
<input type="enum" name="estado">
<input type="text" name="sala">
<input type="text" name="recinto">
<input type="text" name="localidad">
<input type="number" name="usuarioAprobador">
<input type="number" name="usuarioCreador">
<select name="categoria">
    @foreach ($categorias as $categoria)
        <option value="{{$categoria->nombre}}">{{$categoria->nombre}}</option>
    @endforeach
    
</select>
<input type="submit" name="enviar">
</form>
