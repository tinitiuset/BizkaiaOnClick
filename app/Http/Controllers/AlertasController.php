<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AlertasController extends Controller
{
    
        /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {
        // $buscar =  Auth::user();

        $usuarios = User::with("alertas")->where("id",Auth::user()->id)->get();
            
        Log::error("categorias: ".$usuarios[0]->alertas);

        // return view('categoria.index', compact(['categorias', 'buscar']));
        return $usuarios[0]->alertas;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {

        Log::error("categoria fav añadir: ".$request->categoria);

        DB::table('alertas')->insert([
            'idUsuario' => Auth::user()->id,
            'categoria' => $request->categoria
        ]);

        $categoria = Categoria::where("nombre",$request->categoria)->get();
        return redirect("/agenda");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        // Método destroy para borrar

        Log::error("borro: ".$id);

        DB::table('alertas')->where('idUsuario', Auth::user()->id)->where("categoria",$id)->delete();
        return redirect("/agenda");
    }

}
