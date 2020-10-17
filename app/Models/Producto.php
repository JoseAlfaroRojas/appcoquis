<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function clasificacion()
    {
        return $this->belongsTo('App\Models\Clasificacion');
    }

    public function estadoproducto()
    {
        return $this->belongsTo('App\Models\Estadoproducto');
    }

    public function calificacions()
    {
        return $this->hasMany('App\Models\Calificacion');
    }

    public function categorias()
    {
        return $this->belongsToMany('App\Models\Categoria')->withTimestamps();
    }

    public function pedidos()
    {
        return $this->belongsToMany('App\Models\Pedido')->withTimestamps();
    }
}
