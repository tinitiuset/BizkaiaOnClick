@extends('layouts.app')
@section('content')
    
    <div class="d-flex flex-column h-100">
        
        @if (Session::has('mensaje'))
            <agenda mensaje="{{ Session::get('mensaje') }}"></agenda>
        @elseif (Session::has('mensajeEliminado'))
            <agenda mensajeeliminado="{{ Session::get('mensajeEliminado') }}"></agenda>
        @else
            <agenda></agenda>
        @endif

        

    </div>

    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

@endsection