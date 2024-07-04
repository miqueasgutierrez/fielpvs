<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidatos extends Model
{
    use HasFactory;


    protected $table = 'candidatos';

    protected $fillable = ['id_dependencia_cargos', 'id_candidato'];

    
   
    public function dependenciacargo()
    {
        return $this->belongsTo(dependencia_cargo::class, 'id_dependencia_cargos');
    }


    public function dependencia()
    {
        return $this->hasOneThrough(Dependencia::class, dependencia_cargo::class, 'id', 'id', 'id_dependencia_cargos', 'id_dependencia');
    }


     public function cargo()
    {
        return $this->hasOneThrough(Cargo::class, dependencia_cargo::class, 'id', 'id', 'id_dependencia_cargos', 'id_cargo');
    }



    public function elecciones()
    {
         return $this->hasMany(Elecciones::class, 'id_candidato');

    }





    public function registro()
    {
        return $this->belongsTo(Registro::class, 'id_candidato');
    }





}
