<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Evento;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
       
        $reglas = [
           'foto' => 'required|mimes:jpeg,png',
           'evento' => 'required'
        ];

        $mensaje=[
           'required' => 'El campo :attribute es requerido',
            'mimes'=>'Solo se pueden subir archivos PNG o JPG'
        ];
        
        $this->validate($request,$reglas,$mensaje);

        $fichero = $request->file('foto');
    
        $ficheroNombre = $request->input('evento') . "." . $fichero->extension();

        $foto = new Foto;
        
        $foto->ruta = $ficheroNombre;
        
        $foto->evento = $request->input('evento');

        $fichero->storeAs('imgEventos',$ficheroNombre);
        
        $foto->save();
        return redirect('fotos')->with('estado','Foto agregada correctamente');
     }

    //  public function storeOLD(Request $request) {
    //     $reglas = [
    //         'identificador' => 'required|string|min:3|max:255',
    //         'ruta' => 'required|string|min:3|max:255',
    //         'evento' => 'required|string|min:3|max:255'
    //     ];

    //     $validator = Validator::make($request->all(),$reglas);
    //     if ($validator->fails()) {
    //         //return
    //     } else {
    //         $data = $request->input();
    //         $foto = new Foto;
    //         $foto->identificador = $data['identificador'];
    //         $foto->ruta = $data['identificador'];
    //         $foto->evento = $data['identificador'];
    //         $foto->save();
    //         return view (index());
    //     }
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $foto = Foto::find($id);
        return view ('fotos.detalle',array('foto'=>$foto));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id) {
        $foto = Foto::find($id);
        $eventos = Evento::all();
        return view('fotos.editar',array('foto'=>$foto),array('eventos'=>$eventos));
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
            'foto' => 'mimes:jpeg,png',
            'evento' => 'required'
        ];

        $mensaje=[
            'required' => 'El campo :attribute es requerido',
            'mimes'=>'Solo se pueden subir archivos PNG o JPG'
        ];

        $this->validate($request,$reglas,$mensaje);

        $foto = Foto::find($id);

        
        if ($request->file()) {
            Storage::delete('imgEventos/'.$foto->ruta);
            $fichero = $request->file('foto');
            $ficheroNombre = $request->input('evento') . "." . $fichero->extension();
            $foto->ruta = $ficheroNombre;
            $fichero->storeAs('imgEventos',$ficheroNombre);
        } else {
            //TODO
            //Cambiar nombre fichero
            $foto->ruta = $request->input('evento');
            $foto->evento = $request->input('evento');
        }
        
        $foto->update();
        return redirect('fotos')->with('estado','Se ha modificado correctamente');
    }
    // public function updateOLD(Request $request, $id) {
    //     $reglas = [
    //         'ruta' => 'required|string|min:3|max:255',
    //         'evento' => 'required|string|min:3|max:255'
    //     ];

    //     $validator = Validator::make($request->all(),$reglas);
    //     if ($validator->fails()) {
    //         //return
    //     } else {
    //         $data = $request->input();
    //         $fotoVieja = Foto::find($id);
    //         $fotoNueva = new Foto;
    //         $fotoNueva->identificador = $fotoVieja['identificador'];
    //         $fotoNueva->ruta = $data['identificador'];
    //         $fotoNueva->evento = $data['identificador'];
    //         $fotoVieja->update($fotoNueva);
    //         return view(index());
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $foto = Foto::find($id);
        Storage::delete('imgEventos/'.$foto->ruta);
        $foto->delete();
        return redirect()->back()->with('estado','Se ha eliminado la foto correctamente');
    }
}
