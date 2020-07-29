<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AreaTrabajo extends JsonResource
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
            'area_trabajo'=>$this->area_trabajo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
