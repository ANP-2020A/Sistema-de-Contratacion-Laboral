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
        return [
            'id' => $this->id,
            'institucion'=>$this->institucion,
            'nivel'=>$this->nivel,
            'fecha_inicio'=>$this->nivel_ingles,
            'fecha_finalización'=>$this->nivel_ingles,
            'nivel_ingles'=>$this->nivel_ingles,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user'=>"/api/users/".$this->user_id,
        ];
    }
}
