<?php

namespace gesaca\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Anio extends JsonResource
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
            'IdAnio' => $this->IdAnio,
            'Fecha' => $this->Fecha,
            'FechaInicio' => $this->FechaInicio,
            'FechaFin' => $this->FechaFin,
            'Descripcion' => $this->Descripcion,
        ];
    }
}
