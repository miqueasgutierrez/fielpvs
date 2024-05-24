<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoActual extends Model
{
    use HasFactory;
 protected $table = 'cargo_actual';

    protected $fillable = [
        'registro_id',
        'id_dependencia',
        'id_cargo',
    ];

    public function registro()
    {
        return $this->belongsTo(Registro::class);
    }

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, 'id_dependencia');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo');
    }
}