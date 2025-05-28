<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReforestaSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsuariosSeeder::class,
            EspeciesSeeder::class,
            EventosSeeder::class,
            EventoEspecieSeeder::class,
            UsuarioEventoSeeder::class,
            BeneficiosSeeder::class,
        ]);
    }
}