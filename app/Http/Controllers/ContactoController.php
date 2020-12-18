<?php

namespace App\Http\Controllers;


use App\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{


    public function index()
    {



        $contactos = Contacto::all();
        return view('contactos.index',compact('contactos'));
    }
}
