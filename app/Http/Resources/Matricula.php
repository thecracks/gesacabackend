<?php

namespace gesaca\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Matricula extends JsonResource
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
            "IdMatricula" => $this->IdMatricula,
            "IdPersona" => $this->IdPersona,
            "IdNivel" => $this->IdNivel,
            "IdAnio" => $this->IdAnio,
            "Grado" => $this->Grado,
            "Seccion" => $this->Seccion,
            "Nota" => $this->Nota,
            "persona" => $this->persona,
            "nivel" => $this->nivel,
            "anio" => $this->anio,
        ];
    }
}
