<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cproducto extends Model
{
    use SoftDeletes;
    protected $table = "cproductos";
    protected $dates = ['deleted_at'];
    protected $fillable = [ "id",
        'm_title',
        'm_description',
        'm_key',
        'canonical',
        'nombre',
        'descripcion',
        'orden',
        'visitas',
        'slug'
    ];
    public function setNombreAttribute($nombre){
        $this->attributes['nombre'] = $nombre;
        $this->attributes['slug'] = str_slug($nombre);
    }
    public function getUrlAttribute()
    {
        return url($this->slug);
    }

    public function producto()
    {
        return $this->hasMany(producto::class,'cproducto_id');
    }

}
