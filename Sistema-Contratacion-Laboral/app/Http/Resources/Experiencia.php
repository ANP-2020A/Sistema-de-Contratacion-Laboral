<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
class Experiencia extends JsonResource
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
            'nombre_empresa'=>$this->nombre_empresa,
            'area_trabajo'=>$this->area_trabajo,
            'lugar_trabajo'=>$this->lugar_trabajo,
            'fecha_inicio'=>$this->fecha_inicio,
            'fecha_finalizacion'=>$this->fecha_finalización,
            'postulante' => '/api/postulantes/' . $this->postulante_id,
            'nombre_postulante' => $this->postulante->nombre,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
