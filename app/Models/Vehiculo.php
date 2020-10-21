<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    public function tipovehiculo()
    {
        return $this->belongsTo('App\Models\Tipovehiculo');
    }

    public function marca()
    {
        return $this->belongsTo('App\Models\Marca');
    }

    public function personalentregas()
    {
        return $this->hasMany('App\Models\PersonalEntrega');
    }
}
