<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100"> 
<head>
    @include('layouts.header')
</head>

<div class="container">

    <div class="row">
        <div class="col text-center">
            <h1>¡Se han añadido nuevos eventos que puede que te interesen!</h1>
        </div>
    </div>

</div>



<div>{{$usuario->email}}</div>