<?php

namespace gesaca\Model;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "Persona";
    protected $primaryKey = "IdPersona";
    public $timestamps = false;

    protected $fillable = [
        "Nombre", "Paterno", "Materno", "Telefono", "Tipo", "Sub"
    ];

    public function matriculas() {
        return $this->hasMany(Matricula::class, "IdMatricula");
    }
}
