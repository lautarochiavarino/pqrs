<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Confirmacion extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $pqrs;
    public $contacto;


    public function __construct($contacto, $pqrs)
    {
        $this->contacto = $contacto;
        $this->pqrs = $pqrs;
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->subject('Notificación Automática Recibido PQRS AES Colombia')->view('mails.confirmacion');





    }
}
