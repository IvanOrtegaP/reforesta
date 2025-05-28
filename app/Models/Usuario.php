<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;

class Usuario extends Authenticatable
{

    use HasFactory;
    protected $table = 'usuarios';

    protected $fillable = [
        'nick',
        'nombre',
        'apellidos',
        'email',
        'password',
        'karma',
        'suscrito',
        'avatar'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function eventosOrganizados()
    {
        return $this->hasMany(Evento::class, 'usuario_id');
    }

    public function eventosParticipados()
    {
        return $this->belongsToMany(Evento::class, 'usuario_evento');
    }

    public function sumarKarmaPorEvento()
    {
        $this->increment('karma', 3);
    }

    public function sumarKarmaPorPropuesta()
    {
        $this->increment('karma', 4);
    }

    public function sumarKarmaPorPost()
    {
        $this->increment('karma', 2);
    }

    public function sumarKarmaPorInteraccion()
    {
        $this->increment('karma', 1);
    }

}
