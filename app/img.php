<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class img extends Model
{
    use SoftDeletes;
    protected $table = "imgs";
    protected $dates = ['deleted_at'];
    protected $fillable = [ "id",
        'images',
        'nimages',
        'empresa_id',
    ];
    public function empresa()
    {
        return $this->belongsTo('App\producto','empresa_id');
    }
}
