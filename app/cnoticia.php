<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cnoticia extends Model
{
    use SoftDeletes;
    protected $table = "cnoticias";
    protected $dates = ['deleted_at'];
    protected $fillable = [ "id",
            'm_title',
            'm_description',
            'm_key',
            'canonical',
            'nombre',
            'img',
            'nimg',
            'orden',
            'slug'
    ];
    public function setNombreAttribute($nombre){
        $this->attributes['nombre'] = $nombre;
        $this->attributes['slug'] = str_slug($nombre);
    }
    public function getUrlAttribute()
    {
        return url('noticias-de-salud/'.$this->slug);
    }

    public function noticia()
    {
        return $this->belongsToMany(noticia::class);
    }
}
