<?php

namespace gesaca\Model;

use Illuminate\Database\Eloquent\Model;

class Anio extends Model
{
    protected $table = "Anio";

    protected $primaryKey = "IdAnio";

    public $timestamps = false;

    protected $fillable = [
        'Fecha', 'FechaInicio', 'FechaFin', 'Descripcion'
    ];
}
