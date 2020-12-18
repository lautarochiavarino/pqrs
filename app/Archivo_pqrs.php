<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo_pqrs extends Model
{
    protected $table = "archivo_pqrs";

    protected $fillable = [
        'pqrs_id','nombre'
    ];
}
