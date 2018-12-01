<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class newsletters_mayorista extends Model
{
    use SoftDeletes;
    protected $table = "newsletters_mayorista";
    protected $dates = ['deleted_at'];
    protected $fillable = [ "id",
        'nombre',
        'email'
    ];
}
