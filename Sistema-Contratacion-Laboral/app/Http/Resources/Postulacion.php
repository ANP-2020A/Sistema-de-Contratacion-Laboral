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
        return [
            'id' => $this->id,
            'comentario'=>$this->comentario,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user '=>"/api/users/".$this->user_id,
            'oferta '=>"/api/ofertas/".$this->oferta_id,
        ];
    }
}