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
    public function index(Request $request)
    {
        if ($request->get("buscar") != null) {
            // Get the search value from the request
            $search = $request->input('buscar');
        
            // Search in the title and body columns from the posts table
            $datos['eventos'] = Eventos::query()
                ->where('titulo', 'LIKE', "%{$search}%")
                ->orWhere('precio', 'LIKE', "%{$search}%")
                ->orWhere('estado', 'LIKE', "%{$search}%")
                ->orWhere('localidad', 'LIKE', "%{$search}%")
                ->orWhere('categoria', 'LIKE', "%{$search}%")
                ->paginate(10);
        
            // // Return the search view with the resluts compacted
            return view('eventos.index',$datos);
        }

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
         //validaciones para el formulario
          $campos=[


        ];
        $mensaje=[
        ];

        $this->validate($request,$campos,$mensaje);

        $datosEventos = request()->except('_token');
        Categoria::insert($datosEventos);

        return redirect()->route("eventos.index")->with('mensaje','Evento creado con éxito');
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
    public function update(Request $request, $id)
    {
         //validaciones para el formulario
         $campos=[
            
        ];
        $mensaje=[
            

        ];
        $this->validate($request,$campos,$mensaje);

         //recepcionamos todos los datos excepto el token y el método
         $datosEventos = request()->except(['_token','_method']);
         Eventos::where('id','=',$id)->update($datosEventos);
 
         $eventos=Eventos::findOrFail($id);//vuelvo a buscar la info
         return redirect()->route("eventos.index")->with('mensaje','Categoría modificada');
     
      
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
