<form action="{{route('agenda.update',$evento->titulo)}}" method="post">

    @method('PUT')
    @csrf

    <div>
        <label for="titulo">titulo</label>
        <input type="text" name="titulo" id="">
    </div>
    <div>
        <label for="descripcion">descripcion</label>
        <input type="text" name="descripcion" id="">
    </div>

    <div>
        <label for="fechaInicio">fechaInicio</label>
        <input type="text" name="fechaInicio" id="">
    </div>

    <div>
        <label for="fechaFin">fechaFin</label>
        <input type="text" name="fechaFin" id="">
    </div>

    <div>
        <label for="hora">hora</label>
        <input type="text" name="hora" id="">
    </div>

    <div>
        <label for="precio">precio</label>
        <input type="text" name="precio" id="">
    </div>

    <div>
        <label for="direccion">direccion</label>
        <input type="text" name="direccion" id="">
    </div>

    <div>
        <label for="estado">estado</label>
        <input type="text" name="estado" id="">
    </div>

    <div>
        <label for="sala">sala</label>
        <input type="text" name="sala" id="">
    </div>

    <div>
        <label for="recinto">recinto</label>
        <input type="text" name="recinto" id="">
    </div>

    <div>
        <label for="localidad">localidad</label>
        <input type="text" name="localidad" id="">
    </div>


    <input type="submit" value="Enviar">

</form>

<form action="{{route('agenda.destroy',$evento->titulo)}}" method="post">

    @method('DELETE')
    @csrf

    <input type="submit" value="Enviar">

</form>