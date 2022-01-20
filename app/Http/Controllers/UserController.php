<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    public function index() {
        $user = User::all()->toArray();
        return array_reverse($user);
    }
    public function store(Request $request) {
        $user = new User([
            'usuario' => $request->input('usuario'),
            'nombre' => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'email' => $request->input('email'),
            'fechaNac' => $request->input('fechaNac'),
            'tipo' => $request->input('tipo'),
            'telefono' => $request->input('telefono'),
            'estado' => $request->input('estado'),
            'password' => $request->input('password')  
            ]);

        $user->save();
        return response()->json('Usuario Creado!');
    }
    public function show($id) {
        $user = User::find($id);
        return response()->json($user);
    }
    public function update($id, Request $request) {
        $user = User::find($id);
        $user->update($request->all());
        return response()->json('Usuario Creado!');
    }
    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return response()->json('Usuario Creado!');
    }
}
