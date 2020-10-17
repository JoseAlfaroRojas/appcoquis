<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withTimestamps();
    }

    public function productos()
    {
        return $this->belongsToMany('App\Models\Producto');
    }

    public function estadopedido()
    {
        return $this->belongsTo('App\Models\Estadopedido');
    }

    public function tipoentrega()
    {
        return $this->belongsTo('App\Models\Tipoentrega');
    }

    public function direccion()
    {
        return $this->belongsTo('App\Models\Direccion');
    }

    public function personalntrega()
    {
        return $this->belongsTo('App\Models\PersonalEntrega');
    }
}
