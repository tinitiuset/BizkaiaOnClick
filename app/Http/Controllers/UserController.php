<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    public function index()
    {

        $usuarios = User::paginate(25);

        return view('user.index',["usuarios" => $usuarios]);
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
            'usuario'=>['required','string','min:2','max:30','regex:/^[a-zA-Z0-9]+$/'],
            'nombre'=>['required','string','min:2','max:30','regex:/^[a-zA-Z]+([a-zA-Z])+$/'],
            'apellidos'=>['required','string','min:2','max:70','regex:/^[a-zA-Z]+$/'],
            'email'=>['required','string','max:50','regex:/^([a-zA-Z0-9.])+(@{1})+([a-zA-Z0-9]{2,30})+(\.[a-zA-Z0-9]{2,3}){1}$/'],
            'fechaNac'=>['required','string','regex:/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'],
            'telefono'=>['required','string','max:9','min:9','regex:/^(6|7|9)+([0-9]{8})/'],
            // 'password'=>['required','string','max:100','min:8','regex:/^[a-zA-Z0-9]/'],
            // 'confirmarPassword'=>['required','string','max:100','regex:/^[a-zA-Z0-9]/'],
            
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'min' => 'El campo :attribute debe tener como minimo :min caracteres',
            'max' => 'El campo :attribute debe tener como maximo :max caracteres',
            'regex' => 'El campo :attribute no tiene un formato adecuado',
            'usuario.regex'=>'El usuario unicamente debe tener caracteres alfanumericos',
            'nombre.regex'=>'El nombre solo puede contener letras',
            'apellidos.regex'=>'los apellidos solo puede contener letras',
            'email.regex' => 'El email debe tener el siguiente formato: (mikel@example.net)',
            'fechaNac' => 'La fecha de nacimiento debe tener el siguiente formato: AAAA-MM-DD',
            'telefono.regex' => 'El numero de telefono debe ser unicamente numerico y empezar por los numeros 6, 7 o 9'
            
        ];

        $this->validate($request,$campos,$mensaje);

        $datosUsuario = request()->except('_token');

        // if ($datosUsuario->password === $datosUsuario->confirmarPassword) {

        //     return redirect()->route('user.index')->with('mensajeError','Usuario creado con éxito');
            
        // }

        // User::insert($datosUsuario);

        return redirect()->route('user.index')->with('mensaje','Usuario creado con éxito');
        // return redirect()->route('user.index')->with('mensaje',$datosUsuario);

        
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
        return view('user.edit', compact('usuario') );
        // return $usuario;
       
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
       

        return redirect()->route('user.index')->with('mensaje','Usuario modificado');
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
        // User::destroy($nombre);
        User::where("usuario",$nombre)->update(["estado" => "inactivo"]);
        return redirect()->route('user.index')->with('mensaje', 'Usuario deshabilitado');
    }

    

}
