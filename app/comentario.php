<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class comentario extends Model
{
    use SoftDeletes;
    protected $table = "comentarios";
    protected $dates = ['deleted_at'];
    protected $fillable = [ "id",
        'nombre',
        'comentario',
        'puntuacion',
        'estado',
        'producto_id',
        'noticia_id'
    ];
    public function producto()
    {
        return $this->belongsTo('App\producto','producto_id');
    }
    public function noticia()
    {
        return $this->belongsTo(noticia::class,'noticia_id');
    }
}
