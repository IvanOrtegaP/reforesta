<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventoEspecieSeeder extends Seeder
{
    public function run()
    {
        DB::table('evento_especie')->insert([
            [
                'evento_id' => 1,
                'especie_id' => 1,
                'cantidad' => 20
            ],
            [
                'evento_id' => 2,
                'especie_id' => 2,
                'cantidad' => 30
            ],
            [
                'evento_id' => 1,
                'especie_id' => 3,
                'cantidad' => 10
            ],
            [
                'evento_id' => 3,
                'especie_id' => 4,
                'cantidad' => 15
            ],
            [
                'evento_id' => 4,
                'especie_id' => 5,
                'cantidad' => 25
            ]
        ]);
    }
}