<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Foto;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::all();
        $fotos = Foto::all();
        return view('eventos/index',array('eventos' => $eventos),array('fotos'=> $fotos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('eventos/crear');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $evento = new Evento;

        $evento->titulo =  $request->titulo;
        $evento->descripcion =  $request->descripcion;
        $evento->fechaInicio =  $request->fechaInicio;
        $evento->fechaFin =  $request->fechaFin;
        $evento->hora =  $request->hora;
        $evento->precio =  $request->precio;
        $evento->direccion =  $request->direccion;
        $evento->estado =  "pendiente";
        $evento->sala =  $request->sala;
        $evento->recinto =  $request->recinto;
        $evento->localidad =  $request->localidad;

        $evento->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $evento=DB::table("eventos")->select()->where("titulo","=",$id)->get();
        $fotos=DB::table("fotos")->select()->where("evento","=",$id)->get();

        return view ('eventos/detalle', array('evento'=>$evento), array('fotos'=>$fotos));

    }

}