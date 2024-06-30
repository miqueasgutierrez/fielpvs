<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;


     protected $table = 'dependencias';

    protected $fillable= ['nombre'];

   
  public function ambitos()
    {
        return $this->belongsToMany(Ambitodependencias::class,'dependencia_cargos', 'id_dependencia', 'id_ambito');
    } 
 

     public function cargos()
    {
        return $this->belongsToMany(Cargo::class, 'dependencia_cargos', 'id_dependencia', 'id_cargo');
        
    } 
     

     public function dependenciacargo()
    {
        return $this->belongsTo(dependencia_cargo::class, 'id_dependencia');
    }



    public function candidatos()
    {
        return $this->hasManyThrough(
             Candidatos::class,
              dependencia_cargo::class,
            'id_dependencia', // Foreign key on Candidato table...
              'id_dependencia_cargos', // Foreign key on DependenciaCargo table...
            'id', // Local key on Cargo table...
            'id' // Local key on DependenciaCargo table...
        );
    }
    


public function cargosConCandidatos()
    {
        return $this->cargos()->with(['candidatos' => function ($query) {
            $query->where('id_dependencia', $this->id); // Filtra por la dependencia actual
        }]);
    }

    
 

}
