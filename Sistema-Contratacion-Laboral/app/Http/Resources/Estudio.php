<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Estudio extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //$postulante = $this->postulante->user;
        return [
            'id' => $this->id,
            'institucion'=>$this->institucion,
            'nivel'=>$this->nivel,
            'fecha_inicio'=>$this->fecha_inicio,
            'fecha_fin'=>$this->fecha_finalizacion,
            'nivel_ingles'=>$this->nivel_ingles,
            'postulante' => '/api/postulantes/' . $this->postulante_id,
            'nombre_postulante' => $this->postulante->nombre,
            'apellido_postulante' => $this->postulante->apellido,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
