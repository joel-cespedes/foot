<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class mayorista extends Model
{
    protected $table = "mayorista";

    protected $fillable = [ "id",
        'm_title',
        'm_description',
        'm_key',
        'canonical',
        'nombre',
        'cuerpo',
    ];

}
