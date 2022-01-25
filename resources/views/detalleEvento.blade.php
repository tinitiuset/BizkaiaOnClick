@extends('layouts.app')

@section('content')
    
    <div class="d-flex flex-column h-100">

        <detalleevento eventopasado="{{request()->id}}"></detalleevento>

    </div>

    

@endsection