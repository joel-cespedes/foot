<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class nosotros extends Model
{
    protected $table = "nosotros";

    protected $fillable = [ "id",
        'm_title',
        'm_description',
        'm_key',
        'canonical',
        'nombre',
        'cuerpo',
    ];

}
