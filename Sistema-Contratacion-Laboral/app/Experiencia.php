<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    protected $fillable = ['nombre_empresa', 'area_trabajo', 'lugar_trabajo','fecha_inicio','fecha_finalización'];
}
