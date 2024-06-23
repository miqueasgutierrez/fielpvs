<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

     protected $fillable= ['nombre'];


     public function dependencias()
    {
         return $this->belongsToMany(Dependencia::class, 'dependencia_cargos', 'id_cargo', 'id_dependencia');
    }


   
   public function candidatos()
    {
        return $this->hasManyThrough(
            Candidatos::class, 
            dependencia_cargo::class, 
            'id_cargo', // Foreign key on DependenciaCargo table...
            'id_dependencia_cargos', // Foreign key on Candidato table...
            'id', // Local key on Cargo table...
            'id' // Local key on DependenciaCargo table...
        );

}


     
}
