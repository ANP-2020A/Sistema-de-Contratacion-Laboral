<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Oferta extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'titulo_oferta'=>$this->titulo_oferta,
            'descripcion_oferta'=>$this->descripcion_oferta,
            'fecha_publicacion'=>$this->fecha_publicacion,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user'=>"/api/users/".$this->user_id,
            'area '=>"/api/area_trabajos/".$this->area_id,
        ];
    }
}