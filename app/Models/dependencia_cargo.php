<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dependencia_cargo extends Model
{
    use HasFactory;
   protected $table = 'dependencia_cargos';

    protected $fillable = [
        'id_dependencia',
        'id_cargo',
        // Otros campos si los hay
    ];

    // Si tienes campos de fecha, como created_at y updated_at, puedes deshabilitarlos
    public $timestamps = false;

    // Definir relaciones si es necesario
    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, 'id_dependencia');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo');
    }
}