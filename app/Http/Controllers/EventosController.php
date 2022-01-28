<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Eventos;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Eventos::paginate(10);

        return view('eventos.index',["eventos" => $eventos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias['categorias']=Categoria::all();//creo la variable $categorias y le meto en un array todos los datos la busqueda del modelo categoria
        return view('eventos.create',$categorias);//retorno a create pasandole la variable $categorias
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function show(Eventos $eventos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //método para buscar un registro
         $eventos=Eventos::findOrFail($id);
         $categorias=Categoria::all();
         return view('eventos.edit', compact(['eventos','categorias']) );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function getAll(Eventos $eventos)
    {
        $eventos = Eventos::all();
        return response()->json($eventos);
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //método destroy para borrar
        Eventos::destroy($id);
        return redirect()->route("eventos.index")->with('mensaje', 'Evento borrado con éxito');
    }


       
}
