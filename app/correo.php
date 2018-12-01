<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class correo extends Model
{
    use SoftDeletes;
    protected $table = "correos";
    protected $dates = ['deleted_at'];
    protected $fillable = [ "id",
        'nombre',
        'remitente',
        'correo'
    ];
}
