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

    public function postulacion()
    {
        return $this->hasMany('App\Postulacion');
    }

    public function experiencia()
    {
        return $this->hasMany('App\Experiencia');
    }

    public function estudio()
    {
        return $this->hasMany('App\Estudio');
    }

}
