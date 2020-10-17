<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rol()
    {
        return $this->belongsTo('App\Models\Rol');
    }

    public function estadousuario()
    {
        return $this->belongsTo('App\Models\Estadousuario');
    }

    public function direccions()
    {
        return $this->hasMany('App\Models\Direccion');
    }

    public function calificacions()
    {
        return $this->hasMany('App\Models\Calificacion');
    }

    public function pedidos()
    {
        return $this->hasMany('App\Models\Pedido');
    }
}
