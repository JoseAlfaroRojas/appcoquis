<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadousuario extends Model
{
    use HasFactory;

    public function personal_entregas()
    {
        return $this->hasMany('App\Models\PersonalEntrega');
    }
}
