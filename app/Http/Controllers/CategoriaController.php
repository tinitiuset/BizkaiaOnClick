<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Evento;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');
        $categorias = Categoria::query()
            ->where('nombre', 'LIKE', "%{$buscar}%")
            ->orWhere('descripcion', 'LIKE', "%{$buscar}%")
            ->paginate(8);

        return view('categoria.index', compact(['categorias', 'buscar']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('categoria.create');
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
        $campos = [
            'nombre' => 'required|string|max:50',
            'descripcion' => 'required|string|max:400'
        ];
        $mensaje = [
            'required' => 'El campo :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);
        $datosCategoria = request()->except('_token');
        Categoria::insert($datosCategoria);

        return redirect()->route("categoria.index")->with('mensaje', 'Categoría agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param Categoria $categoria
     * @return void
     */
    public function show(Categoria $categoria)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $nombre
     * @return View
     */
    public function edit($nombre)
    {
        //método para buscar un registro
        $categoria = Categoria::findOrFail($nombre);
        return view('categoria.edit', compact('categoria'));

    }

    /**
     * Display the specified resource.
     *
     * @param Categoria $categoria
     * @return JsonResponse
     */
    public function getAll(Categoria $categoria)
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $nombre
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $nombre)
    {
        //validaciones para el formulario
        $campos = [
            // 'nombre'=>'required|string|max:50',
            'descripcion' => 'required|string|max:400'
        ];
        $mensaje = [
            'required' => 'El campo :attribute es requerido'

        ];

        $this->validate($request, $campos, $mensaje);

        //recepcionamos todos los datos excepto el token y el método
        $datosCategoria = request()->except(['_token', '_method']);
        //Busca el registro en categoria dnd nombre=nombre y hace el update
        Categoria::where('nombre', '=', $nombre)->update($datosCategoria);

        $categoria = Categoria::findOrFail($nombre);//vuelvo a buscar la info

        return redirect()->route("categoria.index")->with('mensaje', 'Categoría modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $nombre
     * @return RedirectResponse
     */
    public function destroy($nombre)
    {
        if (count(Evento::where("categoria", $nombre)->get()) > 0)
            return redirect()->route("categoria.index")->with('mensajeError', 'No se puede eliminar la categoria si esta tiene eventos asociados');

        //método destroy para borrar
        Categoria::destroy($nombre);
        return redirect()->route("categoria.index")->with('mensaje', 'Categoría borrada con éxito');
    }
}
