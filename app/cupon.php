<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cupon extends Model
{
    use SoftDeletes;
    protected $table = "cupon";
    protected $dates = ['deleted_at'];
    protected $fillable = [ "id",
            'code',
            'cant_a_usar',
            'type',
            'descuento',
    ];


}
