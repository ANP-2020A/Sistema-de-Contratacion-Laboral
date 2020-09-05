<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    protected $fillable = ['nombre','apellido','cedula','celular','provincia','genero','nacionalidad'];
    public $timestamps=false;

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
}
