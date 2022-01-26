@extends ('adminlte::page')

@section('title','Categorias')

@section('content')
<div class="container">
    <!-- Si existe mensaje crea un div alert con botón de cierre -->
    @if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('mensajeError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @elseif (Session::has('mensajeError'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('mensajeError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

    @endif  
<br>
<a href="{{ url('/admin/categoria/create')}}" class="btn btn-success"> Registrar nueva categoria </a>
{{-- <a href="{{ url('admin')}}" class="btn btn-primary"> Volver </a> --}}
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categorias as $categoria )
        <tr>
            <td>{{ $categoria->nombre }}</td>
            <td>{{ $categoria->descripcion }}</td>
            <td>
                <a href="{{ url('/admin/categoria/'.$categoria->nombre.'/edit')}}" class="btn btn-primary" >
                    <i class="far fa-edit"></i>
                </a>
                <form action="{{ url('/admin/categoria/'.$categoria->nombre) }}" class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')"
                 value="Borrar"><i class="far fa-trash-alt"></i></button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!!$categorias->links()!!} 

</div>
@endsection
