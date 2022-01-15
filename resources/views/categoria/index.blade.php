@extends('layouts.app')
@section('content')
<div class="container">

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        @if (Session::has('mensaje'))
            {{ Session::get('mensaje') }}
        @endif
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<a href="{{ url('categoria/create')}}" class="btn btn-success"> Registrar nueva categoria </a>
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
                <a href="{{ url('/categoria/'.$categoria->nombre.'/edit')}}" class="btn btn-primary" >
                    Editar
                </a>
                |
                <form action="{{ url('/categoria/'.$categoria->nombre) }}" class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')"
                 value="Borrar">

                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
