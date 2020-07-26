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
            $estudio->user_id = Auth::id();
        });
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}

