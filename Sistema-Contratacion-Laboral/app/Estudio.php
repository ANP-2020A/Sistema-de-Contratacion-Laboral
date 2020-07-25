<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    protected $fillable = ['institucion', 'nivel','nivel_ingles','fecha_inicio','fecha_finalización'];
}

