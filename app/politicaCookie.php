<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class politicaCookie extends Model
{
    protected $table = "politica_cookies";
    protected $fillable = [ "id",
        'titulo',
        'texto',
        'm_title',
        'm_description',
        'm_key',
    ];
}
