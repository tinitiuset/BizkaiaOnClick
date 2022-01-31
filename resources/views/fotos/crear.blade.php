@extends ('adminlte::page')

@section('title','Fotos')

@section ('content')
    <div class="card-body" style="padding:30px">
        @if (count($errors)>0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error) 
                    <li>  {{ $error }} </li>
                    @endforeach
                </ul>
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
                <select name="evento" id="">
                    @foreach ($eventos as $evento)
                        {{-- <input type="radio" name="evento" class="btn-check" value="{{$evento['id']}}" id="evento{{$evento['id']}}">
                        <label class="btn btn-outline-success" for="evento{{$evento['id']}}">
                          {{$evento['titulo']}}
                        </label> --}}
                     
                        <option value="{{$evento['id']}}">{{$evento['titulo']}}</option>    
                    @endforeach
                    
                </select>
            </div>
            <div class="form-group text-center">
                <input class="btn btn-success" type="submit" value="Agregar foto">

                <a class="btn btn-primary" href="{{url('admin/fotos')}}"> Volver </a>
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