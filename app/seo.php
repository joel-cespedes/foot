<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seo extends Model
{
    protected $table = "seos";
    protected $fillable = [ "id",
        'nombre_pagina',
        'm_title',
        'm_descripction',
        'm_key',
        'visitas',
        'canonical'
    ];
}
