@extends ('adminlte::page')

@section('title','Crear categoria')
@section('content')
<div class="container">

<form action="{{ url('/admin/categoria') }}" method="post" enctype="multipart/form-data">
@csrf
<!-- Añadimos la variable modo para diferenciar entre crear y editar-->
@include('categoria.form',['modo'=>'Crear'] )
</form>
</div>
@endsection