<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class metodo_envio extends Model
{
    protected $table = "metodo_envio";

    protected $fillable = [ "id",
        'm_title',
        'm_description',
        'm_key',
        'canonical',
        'nombre',
        'cuerpo',
    ];

}
