<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Foto;
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
    public function index()
    {
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $eventos = Evento::all();
        $fotos = Foto::all();
        return view ('eventos.detalle', array('evento'=>$eventos[$id]), array('foto'=>$fotos[$id]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    // API SECTION

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Redirector
     */
    public function store(Request $request)
    {
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
        return redirect('/eventos');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete(Request $request, $id)
    {
        $article = Evento::findOrFail($id);
        $article->delete();

        return response()->noContent();
    }
}
