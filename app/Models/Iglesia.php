<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iglesia extends Model
{
     use HasFactory;

  protected $fillable = ['nombre', 'zona_id'];

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }

    public function circuito()
    {
        return $this->hasOneThrough(Circuito::class, Zona::class, 'id', 'id', 'zona_id', 'circuito_id');
    }


}