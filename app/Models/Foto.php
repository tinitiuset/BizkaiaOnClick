<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'fotos';
    protected $primaryKey = 'id';
    protected $fillable = ['ruta', 'evento'];

    public function evento()
    {
        return $this->belongsTo(Evento::class, "id", "evento");
    }
}
