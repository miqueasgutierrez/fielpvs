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
        return $this->belongsToMany(Dependencia::class, 'dependencia_cargo')->withPivot('id_dependencia');
    }
     
}
