<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{

    use HasFactory;

    protected $table = "eventos";
    protected $fillable = [
        "titulo",
        "descripcion",
        "fechaInicio",
        "fechaFin",
        "hora",
        "precio",
        "direccion",
        "estado",
        "sala",
        "recinto",
        "localidad",
        "usuarioAprueba",
        "usuarioCreador"
    ];
    protected $primaryKey = "titulo";
    protected $keyType = "string";
    public $timestamps = false;

    public function fotos(){

        return $this->hasMany(Foto::class,"evento","titulo");

    }

    public function usuarioAprobador(){

        return $this->hasMany(Foto::class,"evento","titulo");

    }

    public function usuarioCreador(){

        return $this->hasMany(Foto::class,"evento","titulo");

    }

}
