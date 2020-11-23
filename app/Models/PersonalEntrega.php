<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalEntrega extends Model
{
    use HasFactory;

    public function pedidos()
    {
        return $this->hasMany('App\Models\Pedido');
    }

    public function vehiculo()
    {
        return $this->belongsTo('App\Models\Vehiculo');
    }

    public function estadousuario()
    {
        return $this->belongsTo('App\Models\Estadousuario');
    }
}
