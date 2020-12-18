<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = "ciudad";

    protected $fillable = [
        'nombre', 'provincia_id'
    ];

    public static function ciudades($id){
        return Ciudad::where('provincia_id','=',$id)->orderBy('nombre', 'asc')->get();
    }
}
