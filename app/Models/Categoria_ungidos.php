<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria_ungidos extends Model
{
    use HasFactory;

     protected $table = 'categoria_ungidos';

    protected $fillable = [
        'id_registro',
        'nombre',
    ];

    public function registro()
    {
        return $this->belongsTo(Registro::class);
    }

}
