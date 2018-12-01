<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class como_pagar extends Model
{
    protected $table = "como_pagar";

    protected $fillable = [ "id",
        'm_title',
        'm_description',
        'm_key',
        'canonical',
        'nombre',
        'cuerpo',
    ];

}
