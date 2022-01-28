Formulario de creación de eventos
@extends ('adminlte::page')

@section('title','Crear Evento')

@section('content')
<div class="container">

<form action="{{ url('/admin/eventos') }}" method="post" enctype="multipart/form-data">
@csrf
<!-- Añadimos la variable modo para diferenciar entre crear y editar-->
@include('eventos.form',['modo'=>'Crear'] )
</form>
</div>
@endsection
