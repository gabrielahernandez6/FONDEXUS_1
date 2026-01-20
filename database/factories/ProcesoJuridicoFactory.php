<?php

namespace Database\Factories;

use App\Models\Juridica\ProcesoJuridico;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Juridica\ProcesoJuridico>
 */
class ProcesoJuridicoFactory extends Factory
{
    protected $model = ProcesoJuridico::class;

    public function definition(): array
    {
        $radicado = 'PJ-'.fake()->unique()->numberBetween(100000, 999999);

        return [
            'radicado' => $radicado,
            'titulo' => fake()->sentence(6),
            'descripcion' => fake()->optional()->paragraph(),
            'estado' => fake()->randomElement(['abierto', 'en_proceso', 'cerrado']),
            'fecha_inicio' => fake()->optional()->date(),
            'fecha_fin' => null,
            'entidad' => fake()->optional()->company(),
            'responsable_user_id' => null,
            'documento_path' => null,
            'documento_nombre' => null,
            'documento_mime' => null,
            'documento_size' => null,
            'metadata' => [
                'source' => 'factory',
                'uuid' => (string) Str::uuid(),
            ],
        ];
    }
}
