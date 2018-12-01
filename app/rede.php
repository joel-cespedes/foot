<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rede extends Model
{
    protected $dates = ['deleted_at'];
    protected $table = "redes";
    protected $fillable = [ "id",
        'nombre',
        'url',
        'clase',
        'orden'
    ];
}
