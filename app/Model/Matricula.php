<?php

namespace gesaca\Model;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = "Matricula";
    protected $primaryKey = "IdMatricula";
    public $timestamps = false;

    protected $fillable = [
        "IdPersona", "IdPersona", "IdNivel", "IdAnio", "Grado", "Seccion", "Nota", 
    ];

    public function persona() {
        return $this->belongsTo(Persona::class, "IdPersona");
    }

    public function nivel() {
        return $this->belongsTo(Nivel::class, "IdNivel");
    }

    public function anio() {
        return $this->belongsTo(Anio::class, "IdAnio");
    }
}
