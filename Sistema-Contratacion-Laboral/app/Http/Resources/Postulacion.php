<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Postulacion extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //$postulante = $this->postulacion->postulante;
        //$oferta = $this->postulacion->oferta;
        return [
            'id' => $this->id,
            'coment'=>$this->comentario,
            'fecha_postulacion'=>$this->fecha_postulacion,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'postulante '=>$this->postulante->postulante_id,
            'nombre_postulnte '=>$this->postulante->postulante_id,
            'oferta '=>$this->oferta->oferta_id,
        ];
    }
}
