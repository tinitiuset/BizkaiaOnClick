<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Foto;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {


        $eventos = Evento::paginate(15);

        return view('eventos/index',array('eventos' => $eventos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('eventos/create');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        return view ('eventos.detalle', array('id' => $id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id)
    {
        //
    }


    // API SECTION

    /**
     * Get a resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getAll(Request $request): JsonResponse
    {
        $eventos = Evento::where('estado','aprobado')->where('fechaFin','>',date("Y-m-d"))->with("fotos")->get();
        return response()->json($eventos);
    }

    /**
     * Get a resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllEventsCategoriesAndFirstPhoto(Request $request): JsonResponse
    {
        $eventos = Evento::all();
        $categorias = Categoria::all();
        return response()->json(array($eventos,$categorias));
    }

    /**
     * Get all resources in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function get(Request $request, int $id): JsonResponse
    {
        $evento = Evento::with("fotos")->findOrFail($id);
        return response()->json($evento);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $evento = Evento::create($request->all());
        // return response()->json(['mensaje' => 'agregado con exito']);
        // redirect()->back(->with('estado','Evento agregado correctamente.');
        return response()->json($evento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $evento = Evento::findOrFail($id);
        $evento->update($request->all());
        return response()->json($evento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function delete(Request $request, int $id): JsonResponse
    {
        Evento::destroy($id);

        return response()->json("ok");
    }
}
