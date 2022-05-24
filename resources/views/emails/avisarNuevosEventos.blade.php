<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100"> 
<head>
    @include('layouts.header')

    <style>
        .centrarTexto {

            text-align: center;

        }

        .margenCuerpo {

            margin-bottom: 2em;
            margin-top: 3.5em;

        }

        .margenpeque {

            margin: 0.2em;

        }

        .logo{

            height: 200px;
            width: 250px;

        }

    </style>

</head>

<body>
    
    <div class="centrarTexto">
        
        <img src="{{ $message->embed(public_path()."/img/logoColor.png") }}" alt=""/ class="logo">
        <h1 class="margenpeque">¡Se han añadido nuevos eventos que puede que te interesen!</h1>
        
    </div>

    <div class="margenCuerpo">
        <p>
            Hola {{$usuario->usuario}},
        </p>
        
        <p>
            Se han añadido los siguientes eventos de las categorias que te interesan:

            {{-- {{$eventos->nombre}} --}}

        </p>

        @foreach ($eventos as $categoria => $eventosCategoria)
            
            <h4>{{$categoria}}:</h4>
            <ul>
                @foreach ($eventosCategoria as $eventoCategoria)
                    
                    <li>{{$eventoCategoria->titulo}}. <a href="http://localhost:8000/detalleevento/{{$eventoCategoria->id}}">Ver evento</a></li>

                @endforeach
            </ul>

        @endforeach

    </div>

    <div class="margenTitulo">
        <p>Un saludo, <br> BizkaiaOnClick</p>        
    </div>

</body>




