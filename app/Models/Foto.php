<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model {
    use HasFactory;
    protected $table = 'fotos';
    protected $primaryKey = 'identificador';
    protected $fillable = ['identificador','ruta','evento'];

    //Sujeto a cambio
    public $timestamps = false;
}
