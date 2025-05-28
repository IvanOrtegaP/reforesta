<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioEventoSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuario_evento')->insert([
            [
                'usuario_id' => 1,
                'evento_id' => 1
            ],
            [
                'usuario_id' => 2,
                'evento_id' => 2
            ],
            [
                'usuario_id' => 3,
                'evento_id' => 1
            ],
            [
                'usuario_id' => 4,
                'evento_id' => 3
            ],
            [
                'usuario_id' => 5,
                'evento_id' => 4
            ]
        ]);
    }
}