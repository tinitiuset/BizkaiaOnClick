@extends ('adminlte::page')

@section('title','Eventos')
    
@section('content') 
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
        <a href="{{ url('admin/eventos/create')}}" class="btn btn-success"> Registrar nuevo evento </a>
    </div>
    <div class="col-9 p-0">
        {{-- {{$old}} --}}
            <form class="form-inline" action="{{ route('eventos.index') }}" method="GET" role="search">
              <input class="form-control mr-sm-2 w-50" name="buscar" type="search" placeholder="Buscar evento" aria-label="Search" value="{{ old('buscar') }}">
              {{ old('buscar') }}
              <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
            </form>
    </div>
</div>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Título</th>
            <th>Fecha de Inicio</th>
            <th>Hora</th>
            <th>Estado</th>
            <th>Localidad</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($eventos as $evento)
        <tr>
            <td>{{ $evento->titulo }}</td>
            <td>{{ $evento->fechaInicio }}</td>
            <td>{{ $evento->hora }}</td>
            <td>{{ $evento->estado }}</td>
            <td>{{ $evento->localidad }}</td>
            <td>{{ $evento->categoria }}</td>
            <td>
                <a href="{{ url('/admin/eventos/'.$evento->id)}}" class="btn btn-success" >
                    <i class="fas fa-info"></i>
                </a>
                <a href="{{ url('/admin/eventos/'.$evento->id.'/edit')}}" class="btn btn-primary" >
                    <i class="far fa-edit"></i>
                </a>
                <form action="{{ url('/admin/eventos/'.$evento->id) }}" class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar este evento?')"
                 value="Borrar"><i class="far fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Importante!! para que el paginador mantenga la búsqueda -->
{!!$eventos->appends(["buscar" => $buscar])!!} 

</div>
    
@endsection