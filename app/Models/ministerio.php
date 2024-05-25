<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ministerio extends Model
{
    use HasFactory;

     protected $table = 'ministerio';

    protected $fillable = [
        'id_registro',
        'nombre',
    ];

    public function registro()
    {
        return $this->belongsTo(Registro::class);
    }

}
