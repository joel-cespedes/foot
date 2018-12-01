<?php

namespace App;

use App\comentario;
use App\img;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class noticia extends Model
{
    use SoftDeletes;
    protected $table = "noticias";
    protected $dates = ['deleted_at'];
    protected $fillable = [ "id",
        'm_title',
        'm_description',
        'm_key',
        'canonical',
        'nombre',
        'cuerpo',
        'descripcion',
        'img',
        'nimg',
        'slug',
        'estado',
        'orden',
        'visitas'
    ];
    public function setNombreAttribute($nombre){
        $this->attributes['nombre'] = $nombre;
        $this->attributes['slug'] = str_slug($nombre);
    }

    public function getUrlAttribute()
    {
        return url($this->slug);
    }
    public function cnoticia()
    {
        return $this->belongsToMany(cnoticia::class);
    }

    public function producto()
    {
        return $this->belongsToMany(producto::class);
    }

    public function comentario()
    {
        return $this->hasMany(comentario::class,'noticia_id');
    }
    public function  scopeBuscador($consulta, $producto)
    {
        if (trim($producto) !='') {
            return   $consulta->where("nombre" , "LIKE","%$producto%");
        }
    }

}
