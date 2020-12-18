<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GrupoResolutor extends Mailable
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
        return $this->subject('Notificación nueva PQRS recibida')->view('mails.gruporesolutor');
    }
}
