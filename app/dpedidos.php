<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dpedidos extends Model
{
    use SoftDeletes;
    protected $table = "dpedidos";
    protected $fillable = ['id',
        'nombre',
        'cantidad',
        'codigo',
        'precio',
        'precio_unidad',
        'modelo',
        'pedido_id',
        'user_id'
    ];

    public function pedido()
    {
        return $this->belongsTo('App\pedidos','pedido_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
