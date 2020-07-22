<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    protected $fillable = ['Descripciòn_de_estudios', 'Fecha_inicio','Fecha_Finalización'];
}

