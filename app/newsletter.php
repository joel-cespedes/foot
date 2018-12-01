<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class newsletter extends Model
{
    use SoftDeletes;
    protected $table = "newsletters";
    protected $dates = ['deleted_at'];
    protected $fillable = [ "id",
        'nombre',
        'email'
    ];
}
