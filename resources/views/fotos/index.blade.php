@extends ('adminlte::page')

@section('title','Fotos')

@section ('content')
<div class="container">
    <!-- Si existe mensaje crea un div alert con botón de cierre -->
    @if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @elseif (Session::has('mensajeError'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('mensajeError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

    @endif  
<br>

<div class="row">
    <div class="col-3 pe-0 text-end">
        <a href="{{ url('/admin/fotos/create')}}" class="btn btn-success"> Agregar foto </a>
    </div>
</div>
    @if(session('estado'))
        <div class="alert alert-success">{{session('estado')}}</div>
    @endif
    <br>
<br>
<table class="table table-light">
    <thead class="thead-light">
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
            <td>{{ $foto['id'] }}</td>
            <td>{{ $foto['ruta'] }}</td>
            <td>{{ $foto['evento'] }}</td>
            <td><img src="{{ url('img/eventos/'.$foto['ruta']) }}" alt="{{$foto['evento']}}" style="height:50px"></td>
            <td>
                <a href="{{ url('/admin/fotos/'.$foto->id.'/edit') }}" class="btn btn-sm btn-primary">
                    <i class="far fa-edit"></i>
                </a>
                <form action={{url('admin/fotos/'.$foto->id)}} method="POST" class="d-inline">
                @csrf
                {{ method_field('DELETE') }}
                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar esta fotografía?')"
                 value="Borrar"><i class="far fa-trash-alt"></i></button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>  
{!!$fotos->links()!!} 
</div>
@endsection