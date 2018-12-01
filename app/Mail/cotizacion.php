<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class cotizacion extends Mailable
{
    use Queueable, SerializesModels;

    public $datos;
    public $cart;
    public function __construct($datos_email, $cart)
    {
        $this->datos = $datos_email;
        $this->cart = $cart;
    }


    public function build()
    {
        return $this->view('email.cotizacion',compact('datos','cart'))
            ->subject('Compra o  email de Facil Food')
            ->from($this->datos['email']);
    }
}
