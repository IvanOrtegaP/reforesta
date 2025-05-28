<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspeciesSeeder extends Seeder
{
    public function run()
    {
        DB::table('especies')->insert([
            [
                'nombre_cientifico' => 'Quercus robur',
                'crecimiento' => 'Árbol de crecimiento lento.',
                'region' => 'Europa',
                'clima' => 'Templado',
                'foto' => 'quercus_robur.jpg',
                'enlace' => 'https://es.wikipedia.org/wiki/Quercus_robur',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre_cientifico' => 'Pinus pinea',
                'crecimiento' => 'Árbol de crecimiento medio.',
                'region' => 'Mediterráneo',
                'clima' => 'Mediterráneo',
                'foto' => 'pinus_pinea.jpg',
                'enlace' => 'https://es.wikipedia.org/wiki/Pinus_pinea',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre_cientifico' => 'Fagus sylvatica',
                'crecimiento' => 'Árbol de crecimiento lento a medio.',
                'region' => 'Europa',
                'clima' => 'Templado',
                'foto' => 'river-1590010_1280.jpg',
                'enlace' => 'https://es.wikipedia.org/wiki/Fagus_sylvatica',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre_cientifico' => 'Eucalyptus globulus',
                'crecimiento' => 'Árbol de crecimiento rápido.',
                'region' => 'Australia',
                'clima' => 'Subtropical',
                'foto' => 'eucaliptus_globilus.jpg',
                'enlace' => 'https://es.wikipedia.org/wiki/Eucalyptus_globulus',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre_cientifico' => 'Acer pseudoplatanus',
                'crecimiento' => 'Árbol de crecimiento medio.',
                'region' => 'Europa',
                'clima' => 'Templado',
                'foto' => 'acer_pseudoplatanus.jpg',
                'enlace' => 'https://es.wikipedia.org/wiki/Acer_pseudoplatanus',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}