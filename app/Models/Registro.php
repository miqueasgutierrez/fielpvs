<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
  
protected $fillable= ['cedula', 'nombres', 'apellidos','fecha_nacimiento','telefono','edad','genero','profesion','iglesia','pastor','ministerio','circuito','zona','imagen','direccion','estado_civil','fecha_uncion','ministro_ordenado']; 

public function cargosActuales()
    {
        return $this->hasMany(CargoActual::class);
    }
} 
