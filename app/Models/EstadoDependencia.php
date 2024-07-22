<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoDependencia extends Model
{
    use HasFactory;

    protected $table = 'estado_dependencias';

    protected $fillable = [
        'id_dependencia',
        'estado'
    ];

 public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, 'id_dependencia');
    }



}
