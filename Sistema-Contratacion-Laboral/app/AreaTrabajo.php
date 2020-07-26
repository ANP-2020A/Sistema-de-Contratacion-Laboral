<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaTrabajo extends Model
{
    protected $fillable = ['area_trabajo'];

    public function oferta(){
        return $this->hasMany('App\Oferta');
    }
}
