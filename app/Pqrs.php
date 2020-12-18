<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pqrs extends Model
{
    protected $table = "pqrs";

    protected $fillable = [
        'aSuNombre','formatoRecepcion','tipoSolicitud','tipoSolicitante_id','medioRespuesta','breveDescripcion','descripcion','adjuntarSoporte','estado','contacto_id','grupo_id'
    ];

    public function contacto(){

        return $this->belongsTo('App\Contacto','contacto_id');


    }

    public function grupo(){

        return $this->belongsTo('App\Grupo','grupo_id');


    }

    public function responsable(){

        return $this->belongsTo('App\User','responsable_id');


    }



}
