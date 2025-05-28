<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'ubicacion',
        'fecha',
        'tipo_evento',
        't_terreno',
        'usuario_id',
        'imagen',
        'pdf'
    ];

    public function organizador()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function participantes()
    {
        return $this->belongsToMany(Usuario::class, 'usuario_evento');
    }

    public function especies()
    {
        return $this->belongsToMany(Especie::class, 'evento_especie')->withPivot('cantidad');
    }

}
