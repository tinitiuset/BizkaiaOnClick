<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    public function index()
    {
        return view('user.index');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'apellidos'=>'required|string|max:400'
            
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido'

        ];

        $this->validate($request,$campos,$mensaje);

        $datosUsuario = request()->except('_token');
        User::insert($datosUsuario);

        return redirect('user')->with('mensaje','Usuario creado con éxito');
    }
 /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($nombre)
    {
        //método para buscar un registro
        $usuario=User::findOrFail($nombre);
        return view('user.edit', compact('user') );
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function getAll(User $usuario)
    {
        
        $usuarios = User::all();
        return response()->json($usuarios);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nombre)
    {

            //validaciones para el formulario
            $campos=[
                'nombre'=>'required|string|max:50',
                'apellidos'=>'required|string|max:400'
                
            ];
            $mensaje=[
                'required'=>'El campo :attribute es requerido'
    
            ];

        $this->validate($request,$campos,$mensaje);

        //recepcionamos todos los datos excepto el token y el método
        $datosUsuario = request()->except(['_token','_method']);
        //Busca el registro en user dnd nombre=nombre y hace el update
        User::where('nombre','=',$nombre)->update($datosUsuario);

        $usuario=User::findOrFail($nombre);//vuelvo a buscar la info
       

        return redirect('user')->with('mensaje','Usuario modificado');
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
        User::destroy($nombre);
        return redirect('user')->with('mensaje', 'Usuario borrado');
    }
}
