<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['categorias']=Categoria::paginate(5);
        return view('categoria.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categoria.create');
        
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
            'nombre'=>'required|string|max:50',
            'descripcion'=>'required|string|max:400'
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido'

        ];

        $this->validate($request,$campos,$mensaje);

        //$datosCategoria = request()->all();
        $datosCategoria = request()->except('_token');
        Categoria::insert($datosCategoria);

        //return response()->json($datosCategoria);
        return redirect('categoria')->with('mensaje','Categoría agregada con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($nombre)
    {
        //método para buscar un registro
        $categoria=Categoria::findOrFail($nombre);
        return view('categoria.edit', compact('categoria') );
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nombre)
    {

        //validaciones para el formulario
        $campos=[
            'nombre'=>'required|string|max:50',
            'descripcion'=>'required|string|max:400'
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido'

        ];

        $this->validate($request,$campos,$mensaje);

        //recepcionamos todos los datos excepto el token y el método
        $datosCategoria = request()->except(['_token','_method']);
        //Busca el registro en categoria dnd nombre=nombre y hace el update
        Categoria::where('nombre','=',$nombre)->update($datosCategoria);

        $categoria=Categoria::findOrFail($nombre);//vuelvo a buscar la info
        //return view('categoria.edit', compact('categoria') );//retorno con los datos act.

        return redirect('categoria')->with('mensaje','Categoría modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($nombre)
    {
        //método destroy para borrar
        Categoria::destroy($nombre);
        return redirect('categoria')->with('mensaje', 'Categoría borrada');
    }
}
