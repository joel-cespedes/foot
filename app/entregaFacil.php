<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class entregaFacil extends Model
{
    protected $table = "entrega_facils";
    protected $fillable = [ "id",
        'm_title',
        'm_description',
        'm_key',
        'canonical',
        'nombre',
        'cuerpo',
    ];
}
