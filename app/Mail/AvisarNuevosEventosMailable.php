<?php

namespace App\Mail;

use App\Models\Evento;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AvisarNuevosEventosMailable extends Mailable
{
    use Queueable, SerializesModels;


    public $subject = "¡Nuevos eventos interesantes en BizkaiaOnClick!";


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Evento $eventos)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.avisarNuevosEventos');
    }
}
