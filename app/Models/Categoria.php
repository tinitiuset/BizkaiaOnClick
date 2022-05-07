<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "categorias";
    protected $fillable = [
        "nombre",
        "descripcion"
    ];
    protected $primaryKey = "nombre";
    protected $keyType = "string";

    /**
     * Obtengo los eventos relacionados a esta categoria
     */
    public function eventos()
    {
        return $this->hasMany(Evento::class, "categoria", "nombre");
    }

    public function usuariosAlertados() {

        return $this->belongsToMany(User::class, 'alertas', 'categoria', 'idUsuario');

    }

}
