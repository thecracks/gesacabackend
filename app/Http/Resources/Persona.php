<?php

namespace gesaca\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Persona extends JsonResource
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
            'IdPersona' => $this->IdPersona,
            'Nombre' => $this->Nombre,
            'Paterno' => $this->Paterno,
            'Materno' => $this->Materno,
            'Telefono' => $this->Telefono,
            'Tipo' => $this->Tipo,
            'Sub' => $this->Sub,
            'matriculas' => $this->matriculas
        ];
    }
}
