<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta_pqrs extends Model
{
    protected $table = "archivo_respuesta";

    protected $fillable = [
        'pqrs_id','nombre','tipo'
    ];
}
