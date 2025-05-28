<?php
namespace Database\Factories;

use App\Models\Beneficio; 
use App\Models\Especie;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeneficioFactory extends Factory
{
    protected $model = Beneficio::class;

    public function definition()
    {
        return [
            'especie_id' => Especie::factory(),
            'descripcion' => $this->faker->sentence(10)
        ];
    }
}