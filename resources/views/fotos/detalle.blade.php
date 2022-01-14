@extends ('layouts.app')

{{-- @section ('title') {{Foto $foto['identificador']}}@endsection --}}

@section ('content')
    <div class="row">
        <div class="col-sn-4">
            <img src="../img/{{$foto['ruta']}}" alt="{{$foto['evento']}}" style="width:350px;">
        </div>

        <div class="cool-sm-8">
            <h1>Identificador: {{$foto['identificador']}}</h1>
            <h4>Ruta: /img/{{$foto['ruta']}} </h4>
            <h4>Evento: {{$foto['evento']}}</h4>
            <a  href={{route('fotos.destroy',$foto)}} class="btn btn-primary">Borrar foto</a>
            <a href="./" class="btn btn-light border border-dark"> Volver</a>
        </div>
    </div>
@endsection