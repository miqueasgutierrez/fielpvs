<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;

    protected $fillable= ['nombre'];


     public function cargos()
    {
        return $this->belongsToMany(Cargo::class, 'dependencia_cargos', 'id_dependencia', 'id_cargo');
    }
}
