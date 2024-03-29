<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
  
protected $fillable= ['cedula', 'nombres', 'apellidos','fecha_nacimiento','telefono','edad','genero','profesion','iglesia','pastor','cargo','ministerio','dependencia','circuito','zona','imagen','direccion','estado_civil','ministro_ordenado','fecha_uncion']; 
} 
