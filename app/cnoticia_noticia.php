<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cnoticia_noticia extends Model
{
    protected $table = "cnoticia_noticia";
    protected $fillable = [
        "id",
        'cnoticia_id ',
        'noticia_id'
    ];

}
