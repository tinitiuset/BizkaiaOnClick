@extends ('layouts.app')


{{-- @section ('title') Eventos @endsection --}}

@section ('content')
    <div class="row">
        @foreach($fotos as $key => $foto)
        <div class="col-xs-6 col-md-3 text-center">
            <a href={{route('fotos.show',$key)}}>
                <img src="../img/{{$foto['ruta']}}" alt="{{$foto['evento']}}" style="height:200px">
            </a>
        </div>
        @endforeach
        <a href={{route('fotos.create')}}>Agregar foto</a>
    </div>
@endsection