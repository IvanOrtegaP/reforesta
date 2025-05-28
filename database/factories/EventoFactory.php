<?php
namespace Database\Factories;
use App\Models\Beneficio;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Evento;
use App\Models\Usuario;
class EventoFactory extends Factory
{
    protected $model = Evento::class;
    public function definition()
    {
        return [
            'nombre' => $this->faker->sentence(3),
            'descripcion' => $this->faker->sentence(10),
            'ubicacion' => $this->faker->sentence(3),
            'fecha' => $this->faker->date(),
            'tipo_evento' => $this->faker->sentence(3),
            't_terreno' => $this->faker->sentence(3),
            'usuario_id' => Usuario::factory(),
        ];
    }
}
