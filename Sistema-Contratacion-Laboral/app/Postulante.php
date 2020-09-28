<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    protected $fillable = ['nombre','apellido','cedula','celular','provincia','genero','nacionalidad'];
    public $timestamps=false;

    public function User()
    {
        return $this->morphOne('App\User', 'userable');
    }

    public function postulacion()
    {
        return $this->hasMany('App\Postulacion')->withTimestamps();
    }

    public function experiencia()
    {
        return $this->hasMany('App\Experiencia')->withTimestamps();
    }

    public function Estudio()
    {
        return $this->hasMany('App\Estudio')->withTimestamps();
    }
}
