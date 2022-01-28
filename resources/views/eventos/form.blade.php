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
<!-- TITULO -->
<div class="form-group">
    <label for="titulo"> Título: </label>
    @if ($modo == "Ver")
        <input type="text"  class="form-control"  name="titulo" disabled="disabled"
        value="{{ isset($eventos->titulo)?$eventos->titulo:old('titulo') }}">
    @else
        <input type="text"  class="form-control"  name="titulo"
        value="{{ isset($eventos->titulo)?$eventos->titulo:old('titulo') }}">
        <!-- con el método old le indicamos que en caso de error mantenga el registro-->
    @endif 
</div>
<!-- DESCRIPCIÓN -->
<div class="form-group">
    <label for="descripcion"> Descripción: </label>
    @if ($modo == "Ver")
        <textarea type="text" class="form-control" name="descripcion" disabled="disabled">
        {{ isset($eventos->descripcion)?$eventos->descripcion:old('descripcion') }}</textarea> 
    @else
        <textarea type="text" class="form-control" name="descripcion">
        {{ isset($eventos->descripcion)?$eventos->descripcion:old('descripcion') }}</textarea> 
    @endif
</div>
<!-- FECHA INICIO -->
<div class="form-group">
    <label for="fechaInicio"> Fecha de Inicio: </label>
    @if ($modo == "Ver")
        <input type="date"  class="form-control"  name="fechaInicio" disabled="disabled"
        value="{{ isset($eventos->fechaInicio)?$eventos->fechaInicio:old('fechaInicio') }}">
    @else
        <input type="date"  class="form-control"  name="fechaInicio"
        value="{{ isset($eventos->fechaInicio)?$eventos->fechaInicio:old('fechaInicio') }}">
    @endif
   
</div>
<!-- FECHA FIN -->
<div class="form-group">
    <label for="fechaFin"> Fecha Fin: </label>
    @if ($modo == "Ver")
        <input type="date" class="form-control" name="fechaFin" disabled="disabled"
        value="{{ isset($eventos->fechaFin)?$eventos->fechaFin:old('fechaFin') }}"> 
    @else
        <input type="date" class="form-control" name="fechaFin"
        value="{{ isset($eventos->fechaFin)?$eventos->fechaFin:old('fechaFin') }}">  
    @endif 
</div>
<!-- HORA-->
<div class="form-group">
    <label for="hora"> Hora: </label>
    @if ($modo == "Ver")
        <input type="time"  class="form-control"  name="hora" disabled="disabled"
        value="{{ isset($eventos->hora)?$eventos->hora:old('hora') }}">   
    @else
        <input type="time"  class="form-control"  name="hora"
        value="{{ isset($eventos->hora)?$eventos->hora:old('hora') }}">  
    @endif  
</div>
<!-- PRECIO -->
<div class="form-group">
    <label for="precio"> Precio: </label>
    @if ($modo == "Ver")
        <input type="float" class="form-control" name="precio" disabled="disabled"
        value="{{ isset($eventos->precio)?$eventos->precio:old('precio') }}"> 
    @else
        <input type="float" class="form-control" name="precio"
        value="{{ isset($eventos->precio)?$eventos->precio:old('precio') }}"> 
    @endif 
</div>
<!-- DIRECCIÓN -->
<div class="form-group">
    <label for="direccion"> Dirección: </label>
    @if ($modo == "Ver")
        <input type="text" class="form-control" name="direccion" disabled="disabled"
        value="{{ isset($eventos->direccion)?$eventos->direccion:old('direccion') }}"> 
    @else
        <input type="text" class="form-control" name="direccion"
        value="{{ isset($eventos->direccion)?$eventos->direccion:old('direccion') }}"> 
    @endif
</div>
<!-- ESTADO -->
<div class="form-group">
    <label for="estado"> Estado: </label>
    @if ($modo == "Ver")
        <input type="text" class="form-control" name="estado" disabled="disabled"
        value="{{ isset($eventos->estado)?$eventos->estado:old('estado') }}">
    @else
        <select name="estado" id="">   
            @if ($modo == "Editar")
                @if ($eventos->estado == "pendiente")
                    <option value="pendiente" selected>Pendiente</option>    
                    <option value="aprobado">Aprobado</option>
                @else
                    
                    <option value="pendiente">Pendiente</option>    
                    <option value="aprobado"selected>Aprobado</option>

                @endif

            @else
                <option value="pendiente" selected>Pendiente</option>
                <option value="aprobado">Aprobado</option>
            @endif
        </select>
    @endif
<!-- SALA -->
<div class="form-group">
    <label for="sala"> Sala: </label>
    @if ($modo == "Ver")
        <input type="text" class="form-control" name="sala" disabled="disabled"
        value="{{ isset($eventos->sala)?$eventos->sala:old('sala') }}">
    @else
        <input type="text" class="form-control" name="sala"
        value="{{ isset($eventos->sala)?$eventos->sala:old('sala') }}"> 
    @endif
</div>
<!-- RECINTO -->
<div class="form-group">
    <label for="recinto"> Recinto: </label>
    @if ($modo == "Ver")
        <input type="text" class="form-control" name="recinto" disabled="disabled"
        value="{{ isset($eventos->recinto)?$eventos->recinto:old('recinto') }}">
    @else
        <input type="text" class="form-control" name="recinto"
        value="{{ isset($eventos->recinto)?$eventos->recinto:old('recinto') }}">
    @endif 
</div>
<!-- LOCALIDAD -->
<div class="form-group">
    <label for="localidad"> Localidad: </label>
    @if ($modo == "Ver")
        <input type="text" class="form-control" name="localidad" disabled="disabled"
        value="{{ isset($eventos->localidad)?$eventos->localidad:old('localidad') }}">  
    @else
        <input type="text" class="form-control" name="localidad"
        value="{{ isset($eventos->localidad)?$eventos->localidad:old('localidad') }}">  
    @endif 
</div>
<!-- CATEGORÍA -->
<div class="form-group">
    <label for="categoria"> Categoría: </label>
    @if ($modo == "Ver")
        <input type="text" disabled="disabled" class="form-control" name="categoria"
        value={{ isset($eventos->categoria)?$eventos->categoria:old('categoria') }}>
    @else
    <select name="categoria">
        @if ($modo == "Editar")
            @foreach ($categorias as $categoria)
                @if ($categoria->nombre == $eventos->categoria)
                    <option value="{{$categoria->nombre}}" selected>{{$categoria->nombre}}</option>
                @else
                    <option value="{{$categoria->nombre}}">{{$categoria->nombre}}</option>
                @endif
            @endforeach
        @else
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->nombre}}">{{$categoria->nombre}}</option>
            @endforeach
        @endif   
    </select>
    @endif
</div>
<br>
<!-- BOTONES -->
<!-- Agregamos la variable $modo para diferenciar entre crear, ver y editar-->
@if ($modo=="Ver")
    <a class="btn btn-primary" href="{{ url('admin/eventos')}}"> Volver </a>
@else
    <input class="btn btn-success" type="submit" value="{{ $modo }} evento">
    <a class="btn btn-primary" href="{{ url('admin/eventos')}}" onclick="return confirm('Seguro que quieres regresar? Se perderan todos los cambios realizados')"> Volver </a>
    <br>   
@endif
    