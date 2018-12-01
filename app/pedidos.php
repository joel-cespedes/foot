<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pedidos extends Model
{
    use SoftDeletes;
    protected $table = "pedidos";
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function detalle()
    {
        return $this->hasMany('App\dpedidos','pedido_id');
    }
    protected $fillable = [
        'nombre',
        'apellido',
        'ci',
        'telefono',
        'email',
        'mensaje_cliente',
        'adjunto',
        'direccion1',
        'direccion2',
        'referencia',
        'img',
        'rif',
        'compra' ,
        'total' ,
        'fecha' ,
        'datos' ,
        'estado' ,
        'despachado' ,
        'entregado' ,
        'banco_depositante',
        'ci_depositante',
        'nombre_depositante',
        'telf_depositante'

    ];


}
