<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Empresa extends JsonResource
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
            'id'=> $this->id,
            'empresa'=> $this ->empresa,
            'ruc_cedula'=>$this->ruc_cedula,
            'celular'=>$this->celular,
            'sector'=>$this->sector,
            'ubicacion'=>$this->ubicacion,
            'actividad'=>$this->actividad
        ];
    }
}
