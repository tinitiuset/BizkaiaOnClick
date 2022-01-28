formulario que tendrá datos en común con create y edit
<h1> {{ $modo }} eventos </h1>

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
    <label for="titulo"> Título: </label>
    <input type="text"  class="form-control"  name="titulo"
    value="{{ isset($eventos->titulo)?$eventos->usuario:old('usuario') }}">
    <!-- con el método old le indicamos que en caso de error mantenga el registro-->
</div>
<div class="form-group">
    <label for="descripcion"> Descripción: </label>
    <input type="text" class="form-control" name="descripcion"
     value="{{ isset($eventos->descripcion)?$eventos->descripcion:old('descripcion') }}">  
</div>
<div class="form-group">
    <label for="fechaInicio"> Fecha de Inicio: </label>
    <input type="date"  class="form-control"  name="fechaInicio"
    value="{{ isset($eventos->fechaInicio)?$eventos->fechaInicio:old('fechaInicio') }}">
    <!-- con el método old le indicamos que en caso de error mantenga el registro-->
</div>
<div class="form-group">
    <label for="fechaFin"> Fecha Fin: </label>
    <input type="date" class="form-control" name="fechaFin"
     value="{{ isset($eventos->fechaFin)?$eventos->fechaFin:old('fechaFin') }}">  
</div>
<div class="form-group">
    <label for="hora"> Hora: </label>
    <input type="time"  class="form-control"  name="hora"
    value="{{ isset($eventos->hora)?$eventos->hora:old('hora') }}">
    <!-- con el método old le indicamos que en caso de error mantenga el registro-->
</div>
<div class="form-group">
    <label for="precio"> Precio: </label>
    <input type="float" class="form-control" name="precio"
     value="{{ isset($eventos->precio)?$eventos->precio:old('precio') }}">  
</div>
<div class="form-group">
    <label for="direccion"> Dirección: </label>
    <input type="text" class="form-control" name="direccion"
     value="{{ isset($eventos->direccion)?$eventos->direccion:old('direccion') }}">  
</div>
<div class="form-group">
    <label for="estado"> Estado: </label>
    <select name="tipo" id="">   
        @if ($modo == "Editar")
            @if ($usuario->tipo == "administrador")
                <option value="pendiente">Pendiente</option>    
                <option value="aprobado" selected>Aprobado</option>
            @else
                <option value="pendiente" selected>Pendiente</option>
                <option value="aprobado">Aprobado</option>
            @endif
        @else
            <option value="pendiente" selected>Pendiente</option>
            <option value="aprobado">Aprobado</option>
        @endif
    </select>
<div class="form-group">
    <label for="sala"> Sala: </label>
    <input type="text" class="form-control" name="sala"
     value="{{ isset($eventos->sala)?$eventos->sala:old('sala') }}">  
</div>

<div class="form-group">
    <label for="recinto"> Recinto: </label>
    <input type="text" class="form-control" name="recinto"
     value="{{ isset($eventos->recinto)?$eventos->recinto:old('recinto') }}">  
</div>
<div class="form-group">
    <label for="localidad"> Localidad: </label>
    <input type="text" class="form-control" name="localidad"
     value="{{ isset($eventos->localidad)?$eventos->localidad:old('localidad') }}">  
</div>
<div class="form-group">
    <label for="usuarioAprobador"> Usuario Aprobador: </label>
    <input type="number" class="form-control" name="usuarioAprobador"
     value="{{ isset($eventos->usuarioAprobador)?$eventos->usuarioAprobador:old('usuarioAprobador') }}">  
</div>
<div class="form-group">
    <label for="usuarioCreador"> Usuario Creador: </label>
    <input type="number" class="form-control" name="usuarioCreador"
     value="{{ isset($eventos->usuarioCreador)?$eventos->usuarioCreador:old('usuarioCreador') }}">  
</div>

<div class="form-group">
    <label for="categoria"> Categoría: </label>
    <select name="categoria">
        @foreach ($categorias as $categoria)
            <option value="{{$categoria->nombre}}">{{$categoria->nombre}}</option>
        @endforeach
        
    </select>
</div>
<br>
<!-- Agregamos la variable $modo para diferenciar entre crear y editar-->
<input class="btn btn-success" type="submit" value="{{ $modo }} usuario">

<a class="btn btn-primary" href="{{ url('admin/eventos')}}" onclick="return confirm('Seguro que quieres regresar? Se perderan todos los cambios realizados')"> Volver </a>

<br>      