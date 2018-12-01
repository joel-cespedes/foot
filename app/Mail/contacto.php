<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contacto extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $telefono;
    public $email;
    public $asunto;
    public $mensaje;
    public function __construct($query)
    {
        $this->nombre = $query['nombre'];
        $this->telefono = $query['telefono'];
        $this->email = $query['email'];
        $this->asunto = $query['asunto'];
        $this->mensaje =  $query['mensaje'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.contacto',compact('nombre','telefono','email','asunto','mensaje'))
            ->subject('Contacto de FacilFood.com!')
            ->from($this->email);
    }
}
