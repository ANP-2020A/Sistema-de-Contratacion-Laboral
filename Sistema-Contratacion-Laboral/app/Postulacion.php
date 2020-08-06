<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Postulacion extends Model
{
    protected $fillable = ['comentario','fecha_postulacion','oferta_id'];

    public static function boot(){
        parent::boot();
        static::creating(function ($postulacion) {
            $postulacion->user_id = Auth::id();
        });
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function oferta()
    {
        return $this->belongsTo('App\Oferta');
    }
}
