@extends ('adminlte::page')

@section('title','Fotos')

@section ('content')
<div class="card-body" style="padding:30px">
    @if(session('estado'))
        <div class="alert alert-success">{{session('estado')}}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Identificador</th>
                <th>Ruta</th>
                <th>Evento</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fotos as $key => $foto)
                <tr>
                    <td>{{ $foto['identificador'] }}</td>
                    <td>{{ $foto['ruta'] }}</td>
                    <td>{{ $foto['evento'] }}</td>
                    <td><img src="../storage/{{ $foto['ruta'] }}" alt="{{$foto['evento']}}" style="height:50px"></td>
                    <td> <a href="{{ url('fotos/'.$foto->identificador.'/edit') }}" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a>
                   
                        <form action={{url('fotos/'.$foto->identificador)}} method="POST" class="d-inline">
                            @csrf
                            @method ('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" href={{route('fotos.create')}}>Agregar foto</a>
</div>
@endsection