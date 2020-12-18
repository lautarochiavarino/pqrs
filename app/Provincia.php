<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = "provincia";

    protected $fillable = [
        'nombre', 'pais_id'
    ];

    public static function provincias($id){
        return Provincia::where('pais_id','=',$id)->orderBy('nombre', 'asc')->get();
    }
}
