<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Postulacion extends Model
{
    protected $fillable = ['comentario'];

    public static function boot(){
        parent::boot();
        static::creating(function ($postulacion) {
            //$postulacion->postulante_id = Auth::id();
        });
    }

    public function Postulante()
    {
        return $this->belongsTo('App\Postulante','postulante_id');
    }

    public function Oferta()
    {
        return $this->belongsTo('App\Oferta','oferta_id');
    }
}
