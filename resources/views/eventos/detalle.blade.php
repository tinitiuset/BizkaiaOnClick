@extends ('layouts.app')

@section ('title') {{$evento['titulo']}}@endsection

@section ('content')
    <div class="row">
        <div class="col-sn-4">
            <img src="../img/{{$foto['ruta']}}" alt="{{$evento['titulo']}}" style="width:350px;">
        </div>

        <div class="cool-sm-8">
            <h1>{{$evento['titulo']}}</h1>
            <h4>{{$evento['descripcion']}} </h4>
            <p>Fecha: {{$evento['fecha']}}</p>
            <p>Precio: {{$evento['precio']}}</p>
            <p>Dirección: {{$evento['direccion']}} </p>
            <p>Sala: {{$evento['sala']}}</p>
            <p>Recinto: {{$evento['recinto']}} </p>
            <p>Provincia: {{$evento['provincia']}} </p>
            <p>Localidad: {{$evento['localidad']}} </p>
            <a href="./"  type="button" class="btn btn-light border border-dark"> Volver</a>
        </div>
    </div>
@endsection