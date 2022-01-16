<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $eventos = Evento::all();
        $fotos = Foto::all();
        return view('eventos/index',array('eventos' => $eventos),array('fotos'=> $fotos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('eventos/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Redirector
     */
    public function store(Request $request)
    {

        // return "hola";

        Evento::create([
            'titulo' => $request->get('titulo'),
            'descripcion' => $request->get('descripcion'),
            'fechaInicio' => $request->get('fechaInicio'),
            'fechaFin' => $request->get('fechaFin'),
            'hora' => $request->get('hora'),
            'precio' => $request->get('precio'),
            'direccion' => $request->get('direccion'),
            'estado' => $request->get('estado'),
            'sala' => $request->get('sala'),
            'recinto' => $request->get('recinto'),
            'localidad' => $request->get('localidad'),
        ]);

        return view('/eventos/index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(String $titulo)
    {

        $evento=Evento::findOrFail($titulo);
        $fotos=Foto::where("evento",$titulo);

        return view("eventos/detalle",["evento"=>$evento,"fotos"=>$fotos]);

    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $evento = Evento::findOrFail($id);
        $evento->update($request->all());

        return $evento;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(String $evento)
    {

        $evento = Evento::findOrFail($evento);

        return view("administracion/eventos/editar",array("evento"=>$evento));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $evento)
    {
        
        Evento::destroy($evento);

        return view("administracion/eventos/index");

    }
}
