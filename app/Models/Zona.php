<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;

   // Definir los atributos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'circuito_id'
    ];

    // Relación con el modelo Circuito
    public function circuito()
    {
        return $this->belongsTo(Circuito::class);
    }

    // Relación con el modelo Iglesia
    public function iglesias()
    {
        return $this->hasMany(Iglesia::class);
    }
}