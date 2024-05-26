<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
  
protected $fillable= ['cedula', 'nombres', 'apellidos','fecha_nacimiento','telefono','edad','genero','profesion','iglesia','pastor','circuito','zona','imagen','direccion','estado_civil','fecha_uncion']; 

public function cargosActuales()
    {
        return $this->hasMany(CargoActual::class);
    }

 public function ministerios()
    {
        return $this->hasMany(ministerio::class, 'id_registro');
    }

     public function registroDependenciaCargos()
    
    {
        return $this->hasMany(RegistroDependenciaCargo::class);
    }

} 
