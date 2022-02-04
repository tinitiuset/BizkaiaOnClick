@extends ('adminlte::page')

@section('title','Crear usuario')

@section('content')
<div class="container">

<form action="{{ url('/admin/user') }}" method="post" enctype="multipart/form-data">
@csrf
<!-- Añadimos la variable modo para diferenciar entre crear y editar-->
@include('user.form',['modo'=>'Crear'] )
</form>
</div>
@endsection