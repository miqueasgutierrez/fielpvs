<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
  
protected $fillable= ['cedula', 'nombres', 'apellidos','fecha_nacimiento','telefono','edad','genero','profesion','pastor','imagen','direccion','estado_civil','fecha_uncion','ministro_ungido']; 

public function cargosActuales()
    {
        return $this->hasMany(CargoActual::class);
    }

 public function ministerios()
    {
        return $this->hasMany(ministerio::class, 'id_registro');
    }

    public function registroiglesias()
    {
        return $this->hasMany(registroiglesias::class, 'id_registro');
    }

    public function categoriaungido()
    {
        return $this->hasMany(Categoria_ungidos::class, 'id_registro');
    }

     public function registroDependenciaCargos()
    
    {
        return $this->hasMany(RegistroDependenciaCargo::class);
    }

} 
