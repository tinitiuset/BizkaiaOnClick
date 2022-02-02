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
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EventoController extends Controller
{

    /**
     * Get all resources in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getAll(Request $request): JsonResponse
    {
        $eventos = Evento::where('estado','aprobado')->where('fechaFin','>=',date("Y-m-d"))->with("fotos")->get();
        return response()->json($eventos);
    }

    /**
     * Get a resource in storage.
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
        $campos=[
            'titulo'=>['required','string','min:2','max:50','regex:/^[a-zA-Z0-9]+$/', Rule::unique('eventos', 'titulo')],
            'descripcion' => ['required','string'],
            'fechaInicio'=>['required','string','regex:/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'],
            'fechaFin'=>['required','string','regex:/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/','after_or_equal:fechaInicio'],
            'precio' =>['integer','required','max:999'],
            'hora'=>['required','string','regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/'],
            'aforo' => ['integer','max:100000'],
            'direccion'=>['required','string'],
            'localidad'=>['required','string'],
            'categoria'=>['required','string']
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'after_or_equal' => 'La fecha de fin debe ser igual o superior a la fecha de inicio',
            'fechaInicio' => 'La fecha de inicio debe tener el siguiente formato: AAAA-MM-DD',
            'fechaFin' => 'La fecha de fin debe tener el siguiente formato: AAAA-MM-DD',
            'hora.regex' => 'La hora debe tener el siguiente formato: HH:MM',
            'integer' => 'El campo :attribute debe ser numerico',
            'regex' => 'El campo :attribute no tiene un formato adecuado',
            'min' => 'El campo :attribute debe tener como minimo :min caracteres',
            'max' => 'El campo :attribute debe tener como maximo :max caracteres',
            'titulo.regex' => 'El título sólo puede contener letras'
        ];

        $validador = Validator::make($request->all(), $campos, $mensaje);

        $estado['mensajes'] = [];

        if ($validador->fails()) {

            $estado['exito'] = false;
            $errores = $validador->errors()->getMessages();

            foreach ($errores as $valor) {
                array_push($estado['mensajes'],$valor);
            }

        } else {

            $estado['exito'] = true;
            $estado['mensajes'][0] = "Se ha enviado el evento satisfactoriamente.";
            Evento::create([

                "titulo" => request()->input('titulo'),
                "descripcion" => request()->input('descripcion'),
                "fechaInicio" => request()->input('fechaInicio'),
                "fechaFin" => request()->input('fechaFin'),
                "hora" => request()->input('hora'),
                "precio" => request()->input('precio'),
                "direccion" => request()->input('direccion'),
                "aforo" => request()->input('aforo'),
                "recinto" => request()->input('recinto'),
                "localidad" => request()->input('localidad'),
                "categoria" => request()->input('categoria'),
                "estado" => 'pendiente'
            ]);
        }
        return response()->json($estado);
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
