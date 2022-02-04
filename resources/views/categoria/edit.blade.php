@extends ('adminlte::page')

@section('title','Editar Categoria')
@section('content')
<div class="container">

<form action="{{ url('/admin/categoria/'.$categoria->nombre) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    <!-- Añadimos la variable modo para diferenciar entre crear y editar-->
    @include('categoria.form',['modo'=>'Editar'] )
</form>
</div>
@endsection

