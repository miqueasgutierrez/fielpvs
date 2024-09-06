<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriaElecciones extends Model
{
    // Definir el nombre de la tabla asociada
    protected $table = 'historiaelecciones';

    // Definir los campos que se pueden llenar
    protected $fillable = [
        'id_votante', 
        'id_candidato', 
        'created_at', 
        'updated_at'
    ];

    // Indicar que no se actualizan automáticamente las marcas de tiempo
    public $timestamps = false;
}