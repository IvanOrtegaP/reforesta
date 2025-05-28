<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventosSeeder extends Seeder
{
    public function run()
    {
        DB::table('eventos')->insert([
            [
                'nombre' => 'Reforestación en la sierra',
                'descripcion' => 'Evento de reforestación en la Sierra Nevada.',
                'ubicacion' => 'Granada, España',
                'fecha' => '2025-04-15',
                'tipo_evento' => 'Reforestación',
                't_terreno' => 'Montañoso',
                'usuario_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Plantación en la costa',
                'descripcion' => 'Plantación de árboles en la costa mediterránea.',
                'ubicacion' => 'Málaga, España',
                'fecha' => '2025-06-20',
                'tipo_evento' => 'Plantación',
                't_terreno' => 'Litoral',
                'usuario_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Reforestación en el bosque',
                'descripcion' => 'Evento de reforestación en el bosque de Valsaín.',
                'ubicacion' => 'Segovia, España',
                'fecha' => '2025-08-10',
                'tipo_evento' => 'Reforestación',
                't_terreno' => 'Boscoso',
                'usuario_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Plantación en el parque',
                'descripcion' => 'Plantación de árboles en el parque nacional de Doñana.',
                'ubicacion' => 'Huelva, España',
                'fecha' => '2025-09-05',
                'tipo_evento' => 'Plantación',
                't_terreno' => 'Parque',
                'usuario_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}