<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Experiencia extends Model
{
    protected $fillable = ['nombre_empresa', 'area_trabajo', 'lugar_trabajo','fecha_inicio','fecha_finalización'];

    public static function boot(){
        parent::boot();
        static::creating(function ($experiencia) {
            $experiencia->user_id = Auth::id();
        });
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
