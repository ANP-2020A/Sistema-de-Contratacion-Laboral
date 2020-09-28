<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Oferta extends Model
{
    protected $fillable = ['titulo_oferta', 'descripcion_oferta', 'fecha_publicacion', 'link_google_forms', 'area_id'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($ofertaempleo) {
            $ofertaempleo->empresa_id = Auth::id();
        });
    }

    public function AreaTrabajo()
    {
        return $this->belongsTo('App\AreaTrabajo', 'area_id');
    }

    public function Postulacion()
    {
        return $this->hasMany('App\Postulacion');
    }

    public function Empresa()
    {
        return $this->belongsTo('App\Empresa', 'empresa_id');
    }
}
