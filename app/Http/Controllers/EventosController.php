<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Eventos;
use Illuminate\Validation\Rule;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');
                
        $eventos = Eventos::query()
            ->where('titulo', 'LIKE', "%{$buscar}%")
            ->orWhere('fechaInicio', 'LIKE', "%{$buscar}%")
            ->orWhere('estado', 'LIKE', "%{$buscar}%")
            ->orWhere('localidad', 'LIKE', "%{$buscar}%")
            ->orWhere('categoria', 'LIKE', "%{$buscar}%")
            ->paginate(10);

        return view('eventos.index', compact(['eventos','buscar']));
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
            'titulo'=>['required','string','min:2','max:50','regex:/^[a-zA-Z0-9]+$/', Rule::unique('eventos', 'titulo')],
            'fechaInicio'=>['required','string'],
            'fechaFin'=>['required','string'],
            'precio' =>['required','max:3','regex:/^[0-9]/'],
            'hora'=>['required','string'],
            'direccion'=>['required','string'],
            'localidad'=>['required','string'],
            'categoria'=>['required','string'],
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'regex' => 'El campo :attribute no tiene un formato adecuado',
            'min' => 'El campo :attribute debe tener como minimo :min caracteres',
            'max' => 'El campo :attribute debe tener como maximo :max caracteres',
            'titulo.regex' => 'El título sólo puede contener letras'
        ];

        $this->validate($request,$campos,$mensaje);

        $datosEventos = request()->except('_token');
        Eventos::insert($datosEventos);

        return redirect()->route("eventos.index")->with('mensaje','Evento creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventos=Eventos::findOrFail($id);
        $categorias=Categoria::all();
        return view('eventos.show', compact(['eventos','categorias']) );
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
            // 'titulo'=>['required','string','min:2','max:50','regex:/^[a-zA-Z ]+$/', Rule::unique('eventos', 'titulo')],
            'fechaInicio'=>['required','string'],
            'fechaFin'=>['required','string'],
            'precio' =>['required','max:3','regex:/^[0-9]/'],
            'hora'=>['required','string'],
            'direccion'=>['required','string'],
            'localidad'=>['required','string'],
            'categoria'=>['required','string'],
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'regex' => 'El campo :attribute no tiene un formato adecuado',
            'min' => 'El campo :attribute debe tener como minimo :min caracteres',
            'max' => 'El campo :attribute debe tener como maximo :max caracteres',
            'titulo.regex' => 'El título sólo puede contener letras'
        ];

        if (request()->get("titulo") != Eventos::where("id",request()->get("id"))->get("titulo")[0]->titulo) {
            $campos['titulo'] = ['required','string','min:2','max:50', Rule::unique('eventos', 'titulo')];
        }



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
