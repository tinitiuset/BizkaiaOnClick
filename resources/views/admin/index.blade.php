<!-- Extendemos la plantilla de adminlte  -->
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tablero</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-magenta white ">
            <h1 class="initialism text-center">Vista rápida</h1>
        </div>
        <div class="card-body">
            <div class="card cardDashboard">
                <div class="">
                    <h1 class="initialism text-center">Usuarios</h1>
                </div>
                <div class="card-body">
                    <i class="fas fa-user fa-3x fa-lg"></i>
                    {{-- {{count(User::all());}}   --}}
                    
                </div>
            </div>
            <div class="card cardDashboard">
                <div class="">
                    <h1 class="initialism text-center">Eventos recibidos</h1>
                </div>
                <div class="card-body">
                    <i class="fas fa-pencil-alt fa-3x fa-lg"></i>
                </div>
            </div>
            <div class="card cardDashboard">
                <div class="">
                    <h1 class="initialism text-center">Visitantes</h1>
                </div>
                <div class="card-body">
                    <i class="far fa-chart-bar fa-3x fa-lg "></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-magenta white ">
            <h1 class="initialism text-center">últimos usuarios</h1>
        </div>
        <div class="card-body">
            <br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Usuario</th>
            <th>Email</th>
            <th>Estado</th> 
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->usuario }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ $usuario->estado }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
        </div>
    </div>
@stop
<!-- Añadimos este section para cargar hojas de estilo -->
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/estilos.css">
@stop

