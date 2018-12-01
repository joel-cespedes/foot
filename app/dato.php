<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dato extends Model
{

    protected $table = "datos";
    protected $fillable = [ "id",

        'texto_contacto',
        'ublicacion',
        'email',
        'condiciones_compra',
        'texto_contacto',
        'telefono',
        'visitas',
        'mapa',
        'analitycs',
        'visitas',
        'cuentas',
        'textos_inicio',
        'tasa'
    ];
}
