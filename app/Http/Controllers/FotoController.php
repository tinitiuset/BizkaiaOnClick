<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Foto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $fotos = Foto::paginate(10);
        return view('fotos.index', array('fotos' => $fotos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $eventos = Evento::all();
        return view('fotos.crear', array('eventos' => $eventos));
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

        $reglas = [
            'foto' => 'required|mimes:jpeg,png',
            'evento' => 'required'
        ];

        $mensaje = [
            'required' => 'El campo :attribute es requerido',
            'mimes' => 'Solo se pueden subir archivos PNG o JPG'
        ];

        $this->validate($request, $reglas, $mensaje);

        if ($archivoOrigen = $request->file('foto')) {

            if (Foto::select("*")->exists()) {
                $ultimaFoto = intval(Foto::orderBy('id', 'desc')->get("id")->first()["id"]);
                $ultimaFoto += 1;
            } else {
                $ultimaFoto = 1;
            }

            $foto = new Foto;
            $archivoDestino = $ultimaFoto . "." . $archivoOrigen->extension();
            $foto->ruta = $archivoDestino;
            $foto->evento = request()->input('evento');
            $foto->created_at = date("Y-m-d H:i:s");
            $foto->updated_at = date("Y-m-d H:i:s");
            $foto->save();
            $archivoOrigen->move("img/eventos", $archivoDestino);

            return redirect()->route("fotos.index")->with('estado', 'Foto agregada correctamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        $foto = Foto::find($id);
        return view('fotos.detalle', array('foto' => $foto));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */

    public function edit($id)
    {
        $foto = Foto::find($id);
        $eventos = Evento::all();
        return view('fotos.editar', array('foto' => $foto), array('eventos' => $eventos));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, int $id)
    {
        $reglas = [
            'foto' => 'mimes:jpeg,png',
            'evento' => 'required'
        ];

        $mensaje = [
            'required' => 'El campo :attribute es requerido',
            'mimes' => 'Solo se pueden subir archivos PNG o JPG'
        ];

        $this->validate($request, $reglas, $mensaje);

        $foto = Foto::find($id);

        if ($archivoOrigen = $request->file('foto')) {
            File::delete(public_path("img/eventos/$foto->ruta"));
            $ficheroNombre = $foto->id . "." . $archivoOrigen->extension();
            $foto->ruta = $ficheroNombre;
            $archivoOrigen->move("img/eventos", $ficheroNombre);
        }

        $foto->evento = request()->input('evento');

        $foto->updated_at = date("Y-m-d H:i:s");
        $foto->update();
        return redirect()->route('fotos.index')->with('estado', 'Se ha modificado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $foto = Foto::find($id);
        File::delete(public_path("img/eventos/$foto->ruta"));
        $foto->delete();
        return redirect()->back()->with('estado', 'Se ha eliminado la foto correctamente');
    }
}
