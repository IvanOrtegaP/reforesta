<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'nick' => 'juan23',
                'nombre' => 'Juan',
                'apellidos' => 'Pérez Gómez',
                'email' => 'juan23@example.com',
                'password' => Hash::make('password123'),
                'karma' => 10,
                'suscrito' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nick' => 'maria92',
                'nombre' => 'María',
                'apellidos' => 'López Sánchez',
                'email' => 'maria92@example.com',
                'password' => Hash::make('securePass!'),
                'karma' => 20,
                'suscrito' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nick' => 'pedro77',
                'nombre' => 'Pedro',
                'apellidos' => 'García Fernández',
                'email' => 'pedro77@example.com',
                'password' => Hash::make('passPedro77'),
                'karma' => 15,
                'suscrito' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nick' => 'ana88',
                'nombre' => 'Ana',
                'apellidos' => 'Martínez Ruiz',
                'email' => 'ana88@example.com',
                'password' => Hash::make('anaPassword88'),
                'karma' => 25,
                'suscrito' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nick' => 'carlos99',
                'nombre' => 'Carlos',
                'apellidos' => 'Fernández López',
                'email' => 'carlos99@example.com',
                'password' => Hash::make('carlosSecure99'),
                'karma' => 30,
                'suscrito' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nick' => 'test',
                'nombre' => 'testNombre',
                'apellidos' => 'testApelldo',
                'email' => 'test@example.com',
                'password' => Hash::make('1234'),
                'karma' => 0,
                'suscrito' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}