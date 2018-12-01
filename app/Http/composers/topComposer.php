<?php

namespace App\Http\composers;



use App\comentario;
use App\dato;


use App\rede;
use Illuminate\View\View;


class topComposer
{

    public function compose(View $view)
    {

        $datos = dato::find(1);
        $redes = rede::all();
        $comentarios = comentario::where('estado',1)->get();
        $view->with('datos',$datos)
            ->with('redes',$redes)
            ->with('comentarios',$comentarios);
    }
}