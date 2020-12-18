<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $table = "respuesta";


    protected $fillable = [
        'pqrs_id','user_id','nuevaGestion','adjuntarSoporteGestion','nuevoTiempoRespuesta','respuestaPreliminar','adjuntarSoportePreliminar','respuestaFinal','consecutivoCorrespondencia','adjuntarSoporteFinal'
    ];

    public function pqrs(){

        return $this->belongsTo('App\Pqrs','pqrs_id');


    }

    public function user(){

        return $this->belongsTo('App\User','user_id');


    }
}
