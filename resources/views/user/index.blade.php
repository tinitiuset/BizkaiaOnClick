@extends ('adminlte::page')

@section('title','Usuarios')

@section('content')
<div class="container">
    <!-- Si existe mensaje crea un div alert con botón de cierre -->
    @if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif  
<br>
<a href="{{ url('admin/user/create')}}" class="btn btn-success"> Registrar nuevo usuario </a>
{{-- <a href="{{ url('admin')}}" class="btn btn-primary"> Volver </a> --}}
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Fecha de Nacimiento</th>
            <th>Tipo</th>
            <th>Teléfono</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->usuario }}</td>
            <td>{{ $usuario->nombre }}</td>
            <td>{{ $usuario->apellidos }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ $usuario->fechaNac }}</td>
            <td>{{ $usuario->tipo }}</td>
            <td>{{ $usuario->telefono }}</td>
            <td>{{ $usuario->estado }}</td>
            <td>
                <a href="{{ url('admin/user/'.$usuario->id.'/edit')}}" class="btn btn-primary" title="Editar usuario">
                    <i class="far fa-edit"></i>
                </a>
                @if ($usuario->estado == "activo")

                    <form action="{{ url('admin/user/'.$usuario->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres deshabilitar a este usuario?')"
                     value="Borrar" title="Deshabilitar usuario"><i class="far fa-trash-alt"></i></button>
                    </form>
                
                @else

                    {{-- <form action="{{ url('admin/user/'.$usuario->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')"
                     value="Borrar" title="Desactivar usuario"><i class="fas fa-check"></i></button>
                    </form> --}}

                    <a href="{{ url('admin/user/'.$usuario->id.'/reactivar')}}" class="btn btn-success" title="Habilitar usuario" onclick="return confirm('¿Quieres habilitar a este usuario?')">
                        <i class="fas fa-check"></i>
                    </a>

                @endif



            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!!$usuarios->links()!!} 

</div>
@endsection
