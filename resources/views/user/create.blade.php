@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/user') }}" method="post" enctype="multipart/form-data">
@csrf
<!-- Añadimos la variable modo para diferenciar entre crear y editar-->
@include('user.form',['modo'=>'Crear'] );
</form>
</div>
@endsection