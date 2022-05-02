<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{

    use HasFactory;

    protected $table = "eventos";
    protected $fillable = [
        "id",
        "titulo",
        "descripcion",
        "fechaInicio",
        "fechaFin",
        "hora",
        "precio",
        "direccion",
        "estado",
        "aforo",
        "recinto",
        "localidad",
        "usuarioAprobador",
        "usuarioCreador",
        "categoria",
        "URL"
    ];
    protected $primaryKey = "id";

    public function fotos()
    {

        return $this->hasMany(Foto::class, "evento", "id");

    }

    public function usuarioAprobador()
    {

        return $this->belongsTo(User::class, "id", "usuarioAprobador");

    }

    public function usuarioCreador()
    {

        return $this->belongsTo(User::class, "id", "usuarioCreador");

    }


    public function categoria()
    {

        return $this->belongsTo(Categoria::class, "nombre", "categoria");
    }

}
