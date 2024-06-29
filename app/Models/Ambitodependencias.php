<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambitodependencias extends Model
{
    use HasFactory;

     protected $table = 'ambitos_dependencias';

    protected $fillable= ['nombre'];
}
