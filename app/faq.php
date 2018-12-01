<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class faq extends Model
{
    use SoftDeletes;
    protected $table = "faqs";
    protected $dates = ['deleted_at'];
    protected $fillable = [ "id",
        'pregunta',
        'respuesta',
    ];
}
