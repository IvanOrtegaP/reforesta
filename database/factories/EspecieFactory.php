<?php
namespace Database\Factories;
use App\Models\Beneficio;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Especie;


class EspecieFactory extends Factory
{
    protected $model = Especie::class;

    public function definition()
    {
        return [
            'nombre_cientifico' => $this->faker->unique()->word,
            'crecimiento' => $this->faker->sentence,
            'region' => $this->faker->country,
            'clima' => $this->faker->word,
            'foto' => $this->faker->imageUrl(),
            'enlace' => $this->faker->url,
        ];
    }
}

