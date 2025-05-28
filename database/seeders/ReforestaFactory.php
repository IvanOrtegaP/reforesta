<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\EventoFactory;
use Illuminate\Database\Seeder;

use App\Models\Usuario;
use App\Models\Especie;
use App\Models\Beneficio;
use App\Models\Evento;

class ReforestaFactory extends Seeder
{
    public function run(): void
    {
        Usuario::factory()
        ->count(10)
        ->hasAttached(Evento::factory()->count(3), [], 'eventosParticipados')
        ->create();

        Especie::factory()
        ->count(10)
        ->hasAttached(Evento::factory()->count(3), [], 'eventos')
        ->create();

        Evento::factory()
        ->count(10)
        ->has(Usuario::factory()->count(3), 'participantes')
        ->has(Especie::factory()->count(3), 'especies')
        ->create();

        Beneficio::factory()
        ->count(10)
        ->create();
    }
}
