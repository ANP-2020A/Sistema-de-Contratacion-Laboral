<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Estudio extends Model
{
    protected $fillable = ['institucion', 'nivel','nivel_ingles','fecha_inicio','fecha_finalización'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($estudio) {
            //$estudio->postulante_id = Auth::id();
        });
    }

    public function Postulante(){
        return $this->belongsTo('App\Postulante','postulante_id');
    }
}

