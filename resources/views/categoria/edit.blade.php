<form action="{{ url('/categoria/'.$categoria->nombre) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    <!-- Añadimos la variable modo para diferenciar entre crear y editar-->
    @include('categoria.form',['modo'=>'Editar'] );
</form>

