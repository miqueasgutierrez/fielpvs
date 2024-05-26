<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroDependenciaCargo extends Model
{
    use HasFactory;

    protected $table = 'registro_dependencia_cargo'; // Nombre de la tabla si no sigue la convención de Laravel
    protected $fillable = ['registro_id', 'dependencia_cargos_id'];

    // Definir la relación con el modelo Registro
    public function registro()
    {
        return $this->belongsTo(Registro::class);
    }


    public function dependenciaCargo()
    {
        return $this->belongsTo(dependencia_cargo::class, 'dependencia_cargos_id');
    }

}
