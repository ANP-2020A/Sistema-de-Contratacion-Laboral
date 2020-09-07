<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Postulante extends JsonResource
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
            'nombre'=> $this ->nombre,
            'apellido'=>$this->apellido,
            'cedula'=>$this->cedula,
            'celular'=>$this->celular,
            'provincia'=>$this->provincia,
            'genero'=>$this->genero,
            'nacionalidad'=>$this->nacionalidad,
        ];
    }
}
