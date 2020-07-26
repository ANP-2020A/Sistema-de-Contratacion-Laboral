<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Oferta extends Model
{
    protected $fillable = ['titulo_oferta','descripcion_oferta', 'fecha_publicacion'];

    public static function boot(){
        parent::boot();
        static::creating(function ($ofertaempleo) {
            $ofertaempleo->user_id = Auth::id();
        });
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function AreaTrabajo(){
        return $this->belongsTo('App\AreaTrabajo');
    }
}
