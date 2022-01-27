@extends ('adminlte::page')

@section('title','Crear usuario')

@section('content')
<div class="container">

<form action="{{ url('/admin/user/'.$usuario->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
<!-- Añadimos la variable modo para diferenciar entre crear y editar-->
@include('user.form',['modo'=>'Editar'] )
<input type="hidden" name="id" value="{{$usuario->id}}">
</form>
</div>
@endsection