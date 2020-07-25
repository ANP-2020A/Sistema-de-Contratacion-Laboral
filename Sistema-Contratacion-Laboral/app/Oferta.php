<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $fillable = ['titulo_oferta','descripcion_oferta', 'fecha_publicacion'];
}
