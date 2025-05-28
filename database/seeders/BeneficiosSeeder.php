<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeneficiosSeeder extends Seeder
{
    public function run()
    {
        DB::table('beneficios')->insert([
            [
                'especie_id' => 1,
                'descripcion' => 'Proporciona sombra y mejora la biodiversidad.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'especie_id' => 2,
                'descripcion' => 'Produce piñones comestibles y protege contra la erosión.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'especie_id' => 3,
                'descripcion' => 'Aporta materia orgánica al suelo y regula el microclima.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'especie_id' => 4,
                'descripcion' => 'Proporciona madera de alta calidad y es resistente a plagas.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'especie_id' => 5,
                'descripcion' => 'Mejora la calidad del aire y es ornamental.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}