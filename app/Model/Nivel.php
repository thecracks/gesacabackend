<?php

namespace gesaca\Model;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = "Nivel";

    protected $primaryKey = "IdNivel";

    public $timestamps = false;

    protected $fillable = [
        'Descripcion', 'estado'
    ];
}
