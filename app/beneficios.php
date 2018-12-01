<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class beneficios extends Model
{
    use SoftDeletes;
    protected $table = "beneficios";
    protected $dates = ['deleted_at'];
    protected $fillable = [ "id",
        'titulo',
        'nombre',
        'producto_id',

    ];
    public function producto()
    {
        return $this->belongsTo('App\producto','producto_id');
    }

}
