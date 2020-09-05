<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['empresa','ruc_cedula','celular','sector','ubicacion','actividad'];
    public $timestamps=false;

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
}
