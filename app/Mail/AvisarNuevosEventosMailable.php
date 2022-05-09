<?php

namespace App\Mail;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AvisarNuevosEventosMailable extends Mailable
{
    use Queueable, SerializesModels;


    public $subject = "¡Nuevos eventos interesantes en BizkaiaOnClick!";
    public $eventos = null;
    public $usuario = null;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $eventos, User $usuario)
    {

        $this->eventos=$eventos;
        $this->usuario=$usuario;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.avisarNuevosEventos');
    }
}
