<?php

namespace gesaca\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Nivel extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'IdNivel' => $this->IdNivel,
            'Descripcion' => $this->Descripcion,
            'estado' => $this->estado
        ];
    }
}
