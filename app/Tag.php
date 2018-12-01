<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    protected $table = "tags";
    protected $dates = ['deleted_at'];
    protected $fillable = [ "id",
        'nombre',
        'slug'
    ];
    public function setNombreAttribute($nombre){
        $this->attributes['nombre'] = $nombre;
        $this->attributes['slug'] = str_slug($nombre);
    }
    public function getUrlAttribute()
    {
        return url('tag/'.$this->id.'-'.$this->slug);
    }
    public function producto()
    {
        return $this->belongsToMany('App\producto');
    }


}
