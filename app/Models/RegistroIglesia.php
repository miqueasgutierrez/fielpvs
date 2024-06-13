<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroIglesia extends Model
{
  use HasFactory;

    protected $table = 'registro_iglesias';

    protected $fillable = [
        'id_registro', 'id_iglesia'
    ];
}