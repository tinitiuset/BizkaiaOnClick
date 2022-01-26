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
        <form method="POST" enctype="multipart/form-data" accept="image/jpeg, image/png" action={{url('admin/fotos')}}>
            @csrf
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" id="foto" onchange="cargarImg()">
            </div>
            <img src="" alt="" id="fotoCambio" style="height:220px">
            <div class="form-group">
                <label for="">Evento:</label>
                {{-- <select name="evento" id=""> --}}
                    @foreach ($eventos as $evento)
                        <input type="radio" name="evento" class="btn-check" value="{{$evento['id']}}" id="evento{{$evento['id']}}">
                        <label class="btn btn-outline-success" for="evento{{$evento['id']}}">
                          {{$evento['titulo']}}
                        </label>
                     
                        {{-- <option value="{{$evento['id']}}">{{$evento['titulo']}}</option>     --}}
                    @endforeach
                    
                {{-- </select> --}}
            </div>
            <div class="form-group text-center">
                <a href={{url('admin/fotos')}}> 
                    <button type="button" class="btn btn-light" style="padding:8px 100px;margin-top:25px;">
                        Volver
                    </button>
                </a>
                <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                   Agregar foto
                </button>
             </div>
        </form>
    </div>

    <script>
        var cargarImg = function () {
            var imagen = document.getElementById('fotoCambio');
            imagen.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection