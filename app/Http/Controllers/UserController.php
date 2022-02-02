<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    
    public function index(Request $request)
    {

        $buscar = $request->input('buscar');
                
        $usuarios = User::query()
            ->where('usuario', 'LIKE', "%{$buscar}%")
            ->orWhere('nombre', 'LIKE', "%{$buscar}%")
            ->orWhere('apellidos', 'LIKE', "%{$buscar}%")
            ->orWhere('email', 'LIKE', "%{$buscar}%")
            ->orWhere('telefono', 'LIKE', "%{$buscar}%")
            ->paginate(25);

        return view('user.index', compact(['usuarios','buscar']));

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
            'usuario'=>['required','string','min:2','max:30','regex:/^[a-zA-Z0-9]+$/', Rule::unique('users', 'usuario')],
            'nombre'=>['required','string','min:2','max:30','regex:/^[a-zA-Z ]+$/'],
            'apellidos'=>['required','string','min:2','max:70','regex:/^[a-zA-Z ]+$/'],
            'email'=>['required','string','max:50','regex:/^([a-zA-Z0-9.])+(@{1})+([a-zA-Z0-9]{2,30})+(\.[a-zA-Z0-9]{2,3}){1}$/',Rule::unique('users', 'email')],
            'fechaNac'=>['string','regex:/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'],
            'tipo' => ['required','in:usuario,administrador'],
            'telefono'=>['required','string','max:9','min:9','regex:/^(6|7|9)+([0-9]{8})/',Rule::unique('users', 'telefono')],
            'password'=>['required','string','confirmed','max:100',Password::min(8)->mixedCase()->numbers()],
            // 'confirmarPassword'=>['required','string','max:100',Password::min(8)->mixedCase()],
            
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'tipo.in' => 'El tipo de usuario solo puede ser administrador o usuario',
            'min' => 'El campo :attribute debe tener como minimo :min caracteres',
            'max' => 'El campo :attribute debe tener como maximo :max caracteres',
            'regex' => 'El campo :attribute no tiene un formato adecuado',
            'usuario.regex'=>'El usuario unicamente debe tener caracteres alfanumericos',
            'nombre.regex'=>'El nombre solo puede contener letras',
            'apellidos.regex'=>'los apellidos solo puede contener letras',
            'email.regex' => 'El email debe tener el siguiente formato: (mikel@example.net)',
            'fechaNac' => 'La fecha de nacimiento debe tener el siguiente formato: AAAA-MM-DD',
            'telefono.regex' => 'El numero de telefono debe ser unicamente numerico y empezar por los numeros 6, 7 o 9',
            'confirmed' => 'Las contraseñas deben coincidir entre si'
            
        ];

        $this->validate($request,$campos,$mensaje);

        $datosUsuario = request()->except(['_token','password_confirmation']);

        $datosUsuario['password'] = Hash::make($datosUsuario['password']);

        // return $datosUsuario;

        // if ($datosUsuario->password === $datosUsuario->confirmarPassword) {

        //     return redirect()->route('user.index')->with('mensajeError','Usuario creado con éxito');
            
        // }



        // return $datosUsuario;

        User::insert($datosUsuario);

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
     * Display the specified resource.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {

        return "entra a show";

    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // return "hola";

        $campos=[
            // 'usuario'=>['required','string','min:2','max:30','regex:/^[a-zA-Z0-9]+$/', Rule::unique('users', 'usuario')],
            'nombre'=>['required','string','min:2','max:30','regex:/^[a-zA-Z ]+$/'],
            'apellidos'=>['required','string','min:2','max:70','regex:/^[a-zA-Z ]+$/'],
            // 'email'=>['required','string','max:50','regex:/^([a-zA-Z0-9.])+(@{1})+([a-zA-Z0-9]{2,30})+(\.[a-zA-Z0-9]{2,3}){1}$/',Rule::unique('users', 'email')],
            'fechaNac'=>['string','regex:/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'],
            'tipo' => ['in:usuario,administrador'],
            // 'telefono'=>['required','string','max:9','min:9','regex:/^(6|7|9)+([0-9]{8})/',Rule::unique('users', 'telefono')],
            'password'=>['string','confirmed','max:100',Password::min(8)->mixedCase()->numbers()],
            
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'tipo.in' => 'El tipo de usuario solo puede ser administrador o usuario',
            'min' => 'El campo :attribute debe tener como minimo :min caracteres',
            'max' => 'El campo :attribute debe tener como maximo :max caracteres',
            'regex' => 'El campo :attribute no tiene un formato adecuado',
            'usuario.regex'=>'El usuario unicamente debe tener caracteres alfanumericos',
            'nombre.regex'=>'El nombre solo puede contener letras',
            'apellidos.regex'=>'los apellidos solo puede contener letras',
            'email.regex' => 'El email debe tener el siguiente formato: (mikel@example.net)',
            'fechaNac' => 'La fecha de nacimiento debe tener el siguiente formato: AAAA-MM-DD',
            'telefono.regex' => 'El numero de telefono debe ser unicamente numerico y empezar por los numeros 6, 7 o 9',
            'confirmed' => 'Las contraseñas deben coincidir entre si'
            
        ];

        // return User::where("id",request()->get("id"))->get("usuario")[0]->usuario.":".request()->get("usuario");

        // return request()->get("id");

        //hacemos primero una serie de comprobaciones antes de pasar el validador
         //si el nombre de usuario es distinto  le añade la comprobación 
        if (request()->get("usuario") != User::where("id",request()->get("id"))->get("usuario")[0]->usuario) {
            // return "hola";
            $campos['usuario'] = ['required','string','min:2','max:30','regex:/^[a-zA-Z0-9]+$/', Rule::unique('users', 'usuario')];
        } elseif (request()->get("email") != User::where("id",request()->get("id"))->get("email")[0]->email) {
            // return "hola2";
            $campos['email'] = ['required','string','max:50','regex:/^([a-zA-Z0-9.])+(@{1})+([a-zA-Z0-9]{2,30})+(\.[a-zA-Z0-9]{2,3}){1}$/',Rule::unique('users', 'email')];
        } elseif (request()->get("telefono") != User::where("id",request()->get("id"))->get("telefono")[0]->telefono) {
            // return "hola3";
            $campos['telefono'] = ['required','string','max:9','min:9','regex:/^(6|7|9)+([0-9]{8})/',Rule::unique('users', 'telefono')];
        } 

        if (request()->get("fechaNac") == null) {

            unset($campos['fechaNac']);

        }

        $datosUsuario = request()->except(['_token','_method']);

        if (($datosUsuario['password'] == null) && ($datosUsuario['password_confirmation'] == null)) {
            
            $datosUsuario = request()->except(['_token','password_confirmation','_method','password']);
            unset($campos['password']);

        } else {

            $datosUsuario = request()->except(['_token','password_confirmation','_method']);
            $datosUsuario['password'] = Hash::make($datosUsuario['password']);

        }

        $this->validate($request,$campos,$mensaje);

        
        //Busca el registro en user dnd nombre=nombre y hace el update
        User::where('id','=',$id)->update($datosUsuario);

        $usuario=User::findOrFail($id);//vuelvo a buscar la info

        return redirect()->route('user.index')->with('mensaje','Usuario modificado');
       
        // if (URL::previous() === URL::route('/admin/user/{id}/edit')) { 
        //     return redirect()->route('user.index')->with('mensaje','Usuario modificado');
        // } else if(URL::previous() === URL::route('/admin/perfil')) {
        //     return redirect()->route('someroute');
        // }

        
    }

    public function editarPerfil (Request $request, $id) {
        $campos=[
            
            'nombre'=>['required','string','min:2','max:30','regex:/^[a-zA-Z ]+$/'],
            'apellidos'=>['required','string','min:2','max:70','regex:/^[a-zA-Z ]+$/'],
            'fechaNac'=>['string','regex:/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'],
            'tipo' => ['in:usuario,administrador'],
            // 'password'=>['string','confirmed','max:100',Password::min(8)->mixedCase()->numbers()],
            
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'tipo.in' => 'El tipo de usuario solo puede ser administrador o usuario',
            'min' => 'El campo :attribute debe tener como minimo :min caracteres',
            'max' => 'El campo :attribute debe tener como maximo :max caracteres',
            'regex' => 'El campo :attribute no tiene un formato adecuado',
            'usuario.regex'=>'El usuario unicamente debe tener caracteres alfanumericos',
            'nombre.regex'=>'El nombre solo puede contener letras',
            'apellidos.regex'=>'los apellidos solo puede contener letras',
            'email.regex' => 'El email debe tener el siguiente formato: (mikel@example.net)',
            'fechaNac' => 'La fecha de nacimiento debe tener el siguiente formato: AAAA-MM-DD',
            'telefono.regex' => 'El numero de telefono debe ser unicamente numerico y empezar por los numeros 6, 7 o 9',
            'confirmed' => 'Las contraseñas deben coincidir entre si'
            
        ];

        $this->validate($request,$campos,$mensaje);


        $this->update($request, $id);

        return redirect()->route('admin.perfil')->with('mensaje','Perfil modificado');


    }

    public function editarUsuario(Request $request, $id) {
        $campos=[
            
            'nombre'=>['required','string','min:2','max:30','regex:/^[a-zA-Z ]+$/'],
            'apellidos'=>['required','string','min:2','max:70','regex:/^[a-zA-Z ]+$/'],
            'fechaNac'=>['string','regex:/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'],
            'tipo' => ['in:usuario,administrador'],
            // 'password'=>['string','confirmed','max:100',Password::min(8)->mixedCase()->numbers()],
            
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'tipo.in' => 'El tipo de usuario solo puede ser administrador o usuario',
            'min' => 'El campo :attribute debe tener como minimo :min caracteres',
            'max' => 'El campo :attribute debe tener como maximo :max caracteres',
            'regex' => 'El campo :attribute no tiene un formato adecuado',
            'usuario.regex'=>'El usuario unicamente debe tener caracteres alfanumericos',
            'nombre.regex'=>'El nombre solo puede contener letras',
            'apellidos.regex'=>'los apellidos solo puede contener letras',
            'email.regex' => 'El email debe tener el siguiente formato: (mikel@example.net)',
            'fechaNac' => 'La fecha de nacimiento debe tener el siguiente formato: AAAA-MM-DD',
            'telefono.regex' => 'El numero de telefono debe ser unicamente numerico y empezar por los numeros 6, 7 o 9',
            'confirmed' => 'Las contraseñas deben coincidir entre si'
            
        ];
        
        $datosUsuario = request()->except(['_token','_method']);

        if (($datosUsuario['password'] == null) && ($datosUsuario['password_confirmation'] == null)) {
            
            $datosUsuario = request()->except(['_token','password_confirmation','_method','password']);
            unset($campos['password']);

        } else {

            $datosUsuario = request()->except(['_token','password_confirmation','_method']);
            $datosUsuario['password'] = Hash::make($datosUsuario['password']);

        }


        $this->validate($request,$campos,$mensaje);

        $this->update($request, $id);
        return "hola";

        // return redirect()->route('/perfil')->with('mensaje','Usuario modificado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //método destroy para borrar
        // User::destroy($nombre);
        User::where("id",$id)->update(["estado" => "inactivo"]);
        return redirect()->route('user.index')->with('mensaje', 'Usuario deshabilitado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function reactivar($id)
    {
        //método destroy para borrar
        // User::destroy($nombre);
        User::where("id",$id)->update(["estado" => "activo"]);
        return redirect()->route('user.index')->with('mensaje', 'Usuario habilitado');
    }

    

}
