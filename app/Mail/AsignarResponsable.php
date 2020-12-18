<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AsignarResponsable extends Mailable
{
    use Queueable, SerializesModels;

    public $pqrs;
    public $user;


    public function __construct($user, $pqrs)
    {
        $this->user = $user;
        $this->pqrs = $pqrs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Notificación de Asignación de PQRS')->view('mails.asignarresponsable');
    }
}
