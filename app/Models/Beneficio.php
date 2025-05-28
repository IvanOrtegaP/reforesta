<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficio extends Model
{
    use HasFactory;
    protected $table = 'beneficios';

    protected $fillable = [
        'especie_id',
        'descripcion'
    ];

    public function especie()
    {
        return $this->belongsTo(Especie::class);
    }
}
