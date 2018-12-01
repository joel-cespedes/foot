<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class como_comprar extends Model
{
    protected $table = "como_comprar";

    protected $fillable = [ "id",
        'm_title',
        'm_description',
        'm_key',
        'canonical',
        'nombre',
        'cuerpo',
    ];

}
