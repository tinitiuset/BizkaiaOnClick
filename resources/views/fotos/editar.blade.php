@extends ('adminlte::page')

@section('title','Fotos')

@section ('content')
    <div class="card-body" style="padding:30px">
        @if (count($errors)>0)
            <div class="alert alert-danger">
            @foreach ($errors->all() as $error) 
                {{ $error }} <br>
            @endforeach
            </div>
        @endif
        <h3>Valores antiguos:</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Identificador</th>
                    <th>Ruta</th>
                    <th>Evento</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{$foto->id}}</th>
                    <th>{{$foto->ruta}}</th>
                    <th>{{$foto->evento}}</th>
                    <th><img src="/img/eventos/{{ $foto->ruta }}" alt="{{$foto->evento}}" style="height:50px"></th>
                </tr>
            </tbody>
        </table>
        <form method="POST" enctype="multipart/form-data" accept="image/jpeg, image/png" action={{url('fotos/'.$foto->identificador)}}>
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" id="foto" onchange="cargarImg()">
            </div>
            <img src="" alt="" id="fotoCambio" style="height:220px">
            <div class="form-group">
                <label for="">Evento:</label>
                <select name="evento" id="">
                    @foreach ($eventos as $key => $evento)
                        <option>{{$evento['titulo']}}</option>    
                    @endforeach
                </select>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                   Modificar foto
                </button>
             </div>
        </form>
    </div>


    <script src="{{asset('js/post.js')}}"></script>
    <script>
        var cargarImg = function () {
            var imagen = document.getElementById('fotoCambio');
            imagen.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection