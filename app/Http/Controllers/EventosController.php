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
            'fechaInicio'=>['required','string','regex:/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'],
            'fechaFin'=>['required','string','regex:/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/','after_or_equal:fechaInicio'],
            'precio' =>['integer','required','max:999'],
            'hora'=>['required','string','regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/'],
            'aforo' => ['integer','max:100000'],
            'direccion'=>['required','string'],
            'localidad'=>['required','string'],
            'categoria'=>['required','string']
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'after_or_equal' => 'La fecha de fin debe ser igual o superior a la fecha de inicio',
            'fechaInicio' => 'La fecha de inicio debe tener el siguiente formato: AAAA-MM-DD',
            'fechaFin' => 'La fecha de fin debe tener el siguiente formato: AAAA-MM-DD',
            'hora.regex' => 'La hora debe tener el siguiente formato: HH:MM',
            'integer' => 'El campo :attribute debe ser numerico',
            'regex' => 'El campo :attribute no tiene un formato adecuado',
            'min' => 'El campo :attribute debe tener como minimo :min caracteres',
            'max' => 'El campo :attribute debe tener como maximo :max caracteres',
            'titulo.regex' => 'El título sólo puede contener letras'
        ];

        $this->validate($request,$campos,$mensaje);

        $datosEventos = request()->except('_token');
        $datosEventos['hora'] = 
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
         $eventos['hora'] = date("H:i",strtotime($eventos['hora']));
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
            // 'titulo'=>['required','string','min:2','max:50','regex:/^[a-zA-Z0-9]+$/', Rule::unique('eventos', 'titulo')],
            'fechaInicio'=>['required','string','regex:/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'],
            'fechaFin'=>['required','string','regex:/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/','after_or_equal:fechaInicio'],
            'precio' =>['integer','required','max:999'],
            'hora'=>['required','string','regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/'],
            'aforo' => ['integer','max:100000'],
            'direccion'=>['required','string'],
            'localidad'=>['required','string'],
            'categoria'=>['required','string']
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'after_or_equal' => 'La fecha de fin debe ser igual o superior a la fecha de inicio',
            'fechaInicio' => 'La fecha de inicio debe tener el siguiente formato: AAAA-MM-DD',
            'fechaFin' => 'La fecha de fin debe tener el siguiente formato: AAAA-MM-DD',
            'hora.regex' => 'La hora debe tener el siguiente formato: HH:MM',
            'integer' => 'El campo :attribute debe ser numerico',
            'regex' => 'El campo :attribute no tiene un formato adecuado',
            'min' => 'El campo :attribute debe tener como minimo :min caracteres',
            'max' => 'El campo :attribute debe tener como maximo :max caracteres',
            'titulo.regex' => 'El título sólo puede contener letras'
        ];

        if (request()->get("titulo") != Eventos::where("id",request()->get("id"))->get("titulo")[0]->titulo) {
            $campos['titulo'] = ['required','string','min:2','max:50','regex:/^[a-zA-Z0-9]+$/', Rule::unique('eventos', 'titulo')];
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
