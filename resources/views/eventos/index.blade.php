@extends('layouts.app')
@section('content')
    
    <div class="d-flex flex-column h-100">
        {{-- <img src="../img/menuHamburguesa.png"> --}}
        <div class="container-fluid">
            <div>
                <h1>Categorias</h1>
                <select name="" id=""></select>
                
                @foreach ($fotos as $foto)
                <h1>{{$foto}}</h1>
                @endforeach
            </div>
            @foreach ($eventos as $evento)
                
                <div class="row">
                    {{-- <img src="{{$evento->}}" alt="" class=""> --}}
                    <h3 class="text-bold">{{$evento->titulo}}</h2>
                    <p>{{$evento->descripcion}}</p>

                </div>

            @endforeach
            <div class="row text-center">
                <div class="w-50 m-auto g-0">
                    {!!$eventos->links()!!}
                </div>
            </div>
        </div>
        
    </div>

    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

@endsection