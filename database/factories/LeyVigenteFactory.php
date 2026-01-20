<?php

namespace Database\Factories;

use App\Models\Juridica\LeyVigente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Juridica\LeyVigente>
 */
class LeyVigenteFactory extends Factory
{
    protected $model = LeyVigente::class;

    public function definition(): array
    {
        $numero = fake()->unique()->numberBetween(1, 9999);
        $anio = fake()->numberBetween(1990, (int) now()->format('Y'));

        return [
            'codigo' => "Ley {$numero} de {$anio}",
            'titulo' => fake()->sentence(7),
            'descripcion' => fake()->optional()->paragraph(),
            'fecha_publicacion' => fake()->optional()->date(),
            'url' => fake()->optional()->url(),
            'estado' => fake()->randomElement(['vigente', 'derogada', 'modificada']),
            'tags' => fake()->optional()->randomElements(['contratacion', 'secop', 'transparencia', 'procedimiento'], fake()->numberBetween(0, 3)),
        ];
    }
}
