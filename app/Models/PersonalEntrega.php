<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalEntrega extends Model
{
    use HasFactory;

    public function pedidos()
    {
        return $this->hasMany('App\Models\Tipovehiculo');
    }

    public function vehiculos()
    {
        return $this->hasMany('App\Models\Vehiculo');
    }
}
