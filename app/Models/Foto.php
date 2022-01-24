<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model {
    use HasFactory;
    protected $table = 'fotos';
    protected $primaryKey = 'id';
    protected $fillable = ['id','ruta','evento'];

    //Sujeto a cambio
    public $timestamps = false;

    public function evento() {

        return $this->belongsTo(Evento::class,"id","evento");

    }

}
