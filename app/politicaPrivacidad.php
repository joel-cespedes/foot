<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class politicaPrivacidad extends Model
{
    protected $table = "politica_privacidads";
    protected $fillable = [ "id",
        'titulo',
        'texto',
        'm_title',
        'm_description',
        'm_key',
    ];
}
