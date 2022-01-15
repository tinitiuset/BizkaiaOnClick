
@if (Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif

<a href="{{ url('categoria/create')}}"> Registrar nueva categoria </a>
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
                <a href="{{ url('/categoria/'.$categoria->nombre.'/edit')}}">
                    Editar
                </a>
                |
                <form action="{{ url('/categoria/'.$categoria->nombre) }}" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" onclick="return confirm('¿Quieres borrar?')"
                 value="Borrar">

                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
