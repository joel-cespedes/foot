<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pago extends Model
{

    protected $table = "pagos";
    protected $fillable = ['id',
        'tipo',
        'pedido_id',
        'email',
        'first_name',
        'last_name',
        'payer_id',
        'country_code',
        'total',
        'merchant_id',
        'email_original',
        'parent_payment',
        'payment_mode',
        'recipient_name',
        'line1',
        'city',
        'state',
        'postal_code',
        'description',
        'updated_time' ,
        'created_time'

    ];
    public function pedido()
    {
        return $this->belongsTo('App\pedidos','pedido_id');
    }


}
