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
        "fecha",
        "precio",
        "direccion",
        "estado",
        "sala",
        "recinto",
        "provincia",
        "localidad"
    ];
    protected $primaryKey = "titulo";
    protected $keyType = "string";
    public $timestamps = false;
}