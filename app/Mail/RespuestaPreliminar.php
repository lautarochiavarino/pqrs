<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RespuestaPreliminar extends Mailable
{
    use Queueable, SerializesModels;


    public $pqrs;
    public $respuesta;
    public $contacto;
    public $archivos_respuesta;


    public function __construct($respuesta, $pqrs,$contacto,$archivos_respuesta)
    {
    $this->respuesta = $respuesta;
    $this->pqrs = $pqrs;
        $this->contacto = $contacto;
        $this->archivos_respuesta = $archivos_respuesta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Notificación PQRS Respuesta Preliminar')->view('mails.respuestapreliminar');
    }
}
