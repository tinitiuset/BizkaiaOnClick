@extends ('adminlte::page')

@section('title','Editar evento')

@section('content')
<div class="container">

<form action="{{ url('/admin/eventos/'.$eventos->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    <!-- Añadimos la variable modo para diferenciar entre crear y editar-->
    @include('eventos.form',['modo'=>'Editar'] )
    
    <!-- cuando haces el post tb envias este campo para saber a quien estas editando -->
    <input type="hidden" name="id" value="{{$eventos->id}}">
</form>
</div>
@endsection