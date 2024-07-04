<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elecciones extends Model
{
    use HasFactory;


       protected $table = 'elecciones';

    protected $fillable = [
        'id_votante',
        'id_candidato'
    ];

 public function candidato()
    {
        return $this->belongsTo(Candidatos::class, 'id');
    }


}
