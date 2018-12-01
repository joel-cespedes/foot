<?php

namespace App;
use App\comentario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class producto extends Model
{
    use SoftDeletes;
    protected $table = "productos";
    protected $dates = ['deleted_at'];
    protected $fillable = ["id",
        'm_title',
        'm_description',
        'm_key',
        'canonical',
        'nombre',
        'slogan',
        'descripcion',
        'img',
        'nimg',
        'beneficios',
        'promo',
        'palabras',
        'url',
        'estado',
        'cantidad_pastillas',
        'peso',
        'texto_compras',
        'precio',
        'precio_falso',
        'oferta',
        'estado',
        'visitas',
        'informa_nutri',
        'cproducto_id',
        'orden',
        'envio',
        'img_bg'
    ];

    public function cproducto()
    {
        return $this->belongsTo(cproducto::class, 'cproducto_id');
    }

    public function scopeBuscador($consulta, $producto)
    {
        if (trim($producto) != '') {
            return $consulta->where("nombre", "LIKE", "%$producto%");
        }
    }

    public function tag()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function comentario()
    {
        return $this->hasMany(comentario::class);
    }
    public function noticia()
    {
        return $this->belongsToMany(noticia::class);
    }

    public function beneficio()
    {
        return $this->hasMany(beneficios::class);
    }

    public function image()
    {
        return $this->hasMany(img::class,'producto_id');
    }



}
