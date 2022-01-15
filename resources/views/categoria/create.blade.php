@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/categoria') }}" method="post" enctype="multipart/form-data">
@csrf
<!-- Añadimos la variable modo para diferenciar entre crear y editar-->
@include('categoria.form',['modo'=>'Crear'] );
</form>
</div>
@endsection