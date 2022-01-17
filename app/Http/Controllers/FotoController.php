<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Evento;
use Illuminate\Contracts\Validation\Validator;

class FotoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $fotos = Foto::all();
        return view ('fotos.index',array('fotos' => $fotos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $eventos = Evento::all();
        return view ('fotos.crear',array('eventos' => $eventos));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     public function store(Request $request) {
        $foto = new Foto;
        $foto->ruta = $request->input('evento');
        $foto->evento = $request->input('evento');
        $foto->save();
        return redirect()->back()->with('estado','Foto agregada correctamente');
     }

     public function storeOLD(Request $request) {
        $reglas = [
            'identificador' => 'required|string|min:3|max:255',
            'ruta' => 'required|string|min:3|max:255',
            'evento' => 'required|string|min:3|max:255'
        ];

        $validator = Validator::make($request->all(),$reglas);
        if ($validator->fails()) {
            //return
        } else {
            $data = $request->input();
            $foto = new Foto;
            $foto->identificador = $data['identificador'];
            $foto->ruta = $data['identificador'];
            $foto->evento = $data['identificador'];
            $foto->save();
            return view (index());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $fotos = Foto::all();
        return view ('fotos.detalle',array('foto'=>$fotos[$id]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $reglas = [
            'ruta' => 'required|string|min:3|max:255',
            'evento' => 'required|string|min:3|max:255'
        ];

        $validator = Validator::make($request->all(),$reglas);
        if ($validator->fails()) {
            //return
        } else {
            $data = $request->input();
            $fotoVieja = Foto::find($id);
            $fotoNueva = new Foto;
            $fotoNueva->identificador = $fotoVieja['identificador'];
            $fotoNueva->ruta = $data['identificador'];
            $fotoNueva->evento = $data['identificador'];
            $fotoVieja->update($fotoNueva);
            return view(index());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $foto = Foto::find($id);
        // $foto = Foto::all();
        $foto->destroy();
        return index();
    }
}
