<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
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

        config()->set('database.connections.mysql.strict', false);
        DB::reconnect(); //important as the existing connection if any would be in strict mode

        $eventos = Evento::paginate(15);
        // $fotos = Foto::all();
        $fotos = Foto::orderBy('identificador', 'asc')
        ->groupBy('evento')
        ->get(["identificador","ruta","evento"]);

        //now changing back the strict ON
        config()->set('database.connections.mysql.strict', true);
        DB::reconnect();


        return view('eventos/index',array('eventos' => $eventos),array('fotos'=> $fotos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('eventos/crear');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id)
    {
        $eventos = Evento::all();
        $fotos = Foto::all();
        return view ('eventos.detalle', array('evento'=>$eventos[$id]), array('foto'=>$fotos[$id]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        //
    }


    // API SECTION

    /**
     * Get all resources in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function get(Request $request): JsonResponse
    {
        $eventos = Evento::all();
        return response()->json($eventos);
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
