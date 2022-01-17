<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    {{-- <link href="{{ asset('css/menu.css') }}" rel="stylesheet"> --}}
    <title>Agenda</title>
</head>
<body class="h-100">
    
    <div id="app" class="d-flex flex-column h-100">
        {{-- <img src="../img/menuHamburguesa.png"> --}}
        <menujs></menujs>
        <div class="container-fluid">
            <div>
                <h1>Categorias</h1>
                <select name="" id=""></select>
            </div>
            @foreach ($eventos as $evento)
                
                <div class="row">
                    <img src="" alt="" class="">
                    <h3 class="text-bold">{{$evento->titulo}}</h2>
                    <p>{{$evento->descripcion}}</p>
                    
                </div>

            @endforeach
        </div>
        <piedepagina></piedepagina>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>


</body>
</html>