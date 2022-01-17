@extends ('layouts.app')

@section ('title') Eventos 
@endsection 

@section('content')
    
    

@endsection

{{-- @section ('content')
    <div class="row">
        @foreach($eventos as $key => $evento)
        <div class="col-xs-6 col-md-3 text-center">
            <a href={{route('eventos.show',$key)}}>
                @foreach($fotos as $key => $foto)
                @if ($foto['evento'] == $evento['titulo'])
                <img src="../img/{{$foto['ruta']}}" alt="{{$evento['titulo']}}" style="height:200px">
                <h4 style="min-height:45px;margin:5px 0 10px 0">
                    {{$evento['titulo']}}
                </h4>
                @endif
               
                @endforeach
            </a>
        </div>
        @endforeach
    </div>
@endsection --}}