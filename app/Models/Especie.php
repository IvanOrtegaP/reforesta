<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    use HasFactory;

    protected $table = 'especies';

    protected $fillable = [
        'nombre_cientifico',
        'crecimiento',
        'region',
        'clima',
        'foto',
        'enlace'
    ];

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'evento_especie')->withPivot('cantidad');
    }

    public function beneficios()
    {
        return $this->hasMany(Beneficio::class);
    }
}
