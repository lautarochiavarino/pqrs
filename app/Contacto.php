<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = "contacto";

    protected $fillable = [
        'tipoContacto', 'entidad','contacto','cargo','pais_id','provincia_id','ciudad','direccionFisica','cp','email','telFijo1','telFijo2','telCelular','fax','proposito','datosAdicionales','razonSocial','tipoTramite','causal','detalleCausal','codigoSic','nroFactura','fechaEvento'
    ];

    public function pais(){

        return $this->belongsTo('App\Pais','pais_id');


    }

    public function provincia(){

        return $this->belongsTo('App\Provincia','provincia_id');


    }

    public function ciudadd(){

        return $this->belongsTo('App\Ciudad','ciudad');


    }
}
