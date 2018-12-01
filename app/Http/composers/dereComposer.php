<?php

namespace App\Http\composers;



use App\producto;
use App\Tag;
use App\comentario;



use Illuminate\View\View;


class dereComposer
{

    public function compose(View $view)
    {
        $mas_vendido = producto::where('cproducto_id',1)->orderby('visitas','desc')->first();
        $pack_vendido = producto::where('cproducto_id',2)->orderby('visitas','desc')->first();
        $tag_mas = Tag::all();
        $comentarios = comentario::where('estado',1)->orderBy('puntuacion','DESC')->take(10)->get();


        $view->with('mas_vendido',$mas_vendido)
            ->with('tag_mas',$tag_mas)
            ->with('comentarios',$comentarios)
            ->with('pack_vendido',$pack_vendido);
    }
}